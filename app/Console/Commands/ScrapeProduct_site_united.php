<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Http\UploadedFile;

class ScrapeProduct_site_united extends Command
{
    // The name and signature of the console command.
    protected $signature = 'scrape:product_site_united';

    // The console command description.
    protected $description = 'Scrape product categories and subcategories from unitedpharmacy.sa';
    
    // Counter for naming images
    protected $imageCounter = 1;

    // Create a new command instance.
    public function __construct()
    {
        parent::__construct();
    }

    // Execute the console command.
    public function handle()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://unitedpharmacy.sa/ar/');

        // Mapping array for Arabic numerals to English numerals
        $arabicToEnglish = [
            '٠' => '0',
            '١' => '1',
            '٢' => '2',
            '٣' => '3',
            '٤' => '4',
            '٥' => '5',
            '٦' => '6',
            '٧' => '7',
            '٨' => '8',
            '٩' => '9',
        ];

        // Select all category elements
        $crawler->filter('#store\\.menu > div.magicmenu.clearfix > ul > li.level0.category-item.level-top.cat')
                ->each(function ($node) use ($client, $arabicToEnglish) {
            $categoryName = trim($node->filter('a > span:nth-child(1)')->text());

            // Skip the category labeled "فيتابيوتكس"
            if ($categoryName !== 'فيتابيوتكس') {
                $this->info($categoryName);

                // Find the subcategories for each category
                $node->filter('div > div > div > ul > li.children.level1.category-item > ul > li.level2.category-item')
                     ->each(function ($subNode) use ($client, $arabicToEnglish, $categoryName) {
                         $subcategoryName = trim($subNode->filter('a > span')->text());
                         $link = $subNode->filter('a')->attr('href');
                         $this->info('  - ' . $subcategoryName . ' (' . $link . ')');

                         // Check if the category already exists in the database
                         $category = Category::firstOrCreate(['name' => $categoryName]);

                         // Check if the subcategory already exists in the database
                         $subcategory = SubCategory::firstOrCreate(['name' => $subcategoryName, 'categoryId' => $category->id]);

                         // Use Goutte client to request the subcategory page
                         $retryCount = 0;
                         $maxRetries = 3;
                         $subCrawler = null;

                         while ($retryCount < $maxRetries) {
                             try {
                                 $subCrawler = $client->request('GET', $link);
                                 break; // Exit the loop if the request is successful
                             } catch (\Exception $e) {
                                 $retryCount++;
                                 if ($retryCount == $maxRetries) {
                                     $this->error('Failed to fetch subcategory page after multiple attempts: ' . $link);
                                     return;
                                 }
                                 sleep(2); // Wait for 2 seconds before retrying
                             }
                         }

                         if (!$subCrawler) {
                             return;
                         }

                         // Select all product elements
                         $subCrawler->filter('#layerednav-list-products > div.category-products.clearfix.products.wrapper.grid.products-grid > ol > li.item.product.product-item')
                                    ->each(function ($productNode) use ($client, $arabicToEnglish, $subcategory, $maxRetries, $category) {
                                        $productName = trim($productNode->filter('h2.product.name.product-name.product-item-name > a')->text());
                                        $productLink = $productNode->filter('h2.product.name.product-name.product-item-name > a')->attr('href');

                                        // Extract product image URL
                                        $productImage = $productNode->filter('div.product-hover a.product-item-photo img.product-image-photo')->attr('data-src');
                                        $image_product_db = $this->imageCounter . '.png';
                                        $this->imageCounter++; // Increment the counter
                                        
                                        // تنزيل الصور وحفظها محليًا
                                        $imageContent = file_get_contents($productImage);
                                        $savePath = public_path('Product_img') . DIRECTORY_SEPARATOR . $image_product_db;
                                        file_put_contents($savePath, $imageContent);

                                        $productPrice = trim($productNode->filter('span.price')->text());
                                        // Convert Arabic numerals to English numerals
                                        $numericPrice = strtr($productPrice, $arabicToEnglish);

                                        // Extract just the numeric part of the price and replace Arabic decimal separator
                                        $numericPrice = str_replace(['٫', 'ر.س.'], ['.', ''], $numericPrice);

                                        $this->info('    - Product: ' . $productName);
                                        $this->info('      Link: ' . $productLink);
                                        $this->info('      Image: ' . $savePath);
                                        $this->info('      Price: ' . $numericPrice);


                                        // Visit product page to get the description
                                        $productDescription = null;
                                        $retryCount = 0;

                                        while ($retryCount < $maxRetries) {
                                            try {
                                                $productHtml = $client->request('GET', $productLink)->html();
                                                $productCrawler = new Crawler($productHtml);
                                                $productDescriptionNode = $productCrawler->filter('#maincontent > div.columns > div > div.product-info-main > div.product.attribute.overview > div > p');

                                                if ($productDescriptionNode->count() > 0) {
                                                    $productDescription = $productDescriptionNode->text();
                                                }
                                                break;
                                            } catch (\Exception $e) {
                                                $retryCount++;
                                                if ($retryCount == $maxRetries) {
                                                    $this->error('Failed to fetch product page after multiple attempts: ' . $productLink);
                                                    $productDescription = null;
                                                    break;
                                                }
                                                sleep(2); // Wait for 2 seconds before retrying
                                            }
                                        }

                                        // Check if the product already exists in the database
                                        $existingProduct = Product::where('title', $productName)
                                            ->where('subcategory_id', $subcategory->id)
                                            ->first();


                                        $this->info('      Description: ' . $productDescription);

                                        if (!$existingProduct) {
                                            // Save the product details to the database
                                            Product::create([
                                                'title' => $productName,
                                                'price' => $numericPrice,
                                                'description' => $productDescription,
                                                'category_id' => $category->id,
                                                'subcategory_id' => $subcategory->id,
                                                'image' => $image_product_db,
                                                'quantity' => 100,
                                            ]);
                                        }
                                    });
                     });
            }
        });

        $this->info('Scraping completed!');
    }
}

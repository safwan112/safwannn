<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ScrapeProductSite2New extends Command
{
    protected $signature = 'scrape:product_site2';
    protected $description = 'Scrape product details from Asrar website';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Starting the scraping process...');

        $client = new Client();
        $url = 'https://www.asrar-co.com';
        $crawler = $client->request('GET', $url);

        $imageCounter = 3000;

        $crawler->filter('#main-menu > ul > li.menu-item.main-menu-item.multi-level.dropdown.drop-menu')->each(function ($node) use ($client, &$imageCounter) {
            $categoryName = $node->filter('a > span.links-text')->text();

            if ($categoryName === 'العروض') {
                return;
            }

            $category = Category::firstOrCreate(['name' => $categoryName]);

            $dropdownMenu = $node->filter('.dropdown-menu');
            if ($dropdownMenu->count() > 0) {
                $dropdownMenu->filter('ul.j-menu > li.menu-item')->each(function ($subNode) use ($client, $category, &$imageCounter) {
                    $subcategoryName = $subNode->filter('a > span.links-text')->text();
                    $subcategoryLink = $subNode->filter('a')->attr('href');

                    $subCategory = SubCategory::firstOrCreate(['name' => $subcategoryName, 'categoryId' => $category->id]);

                    $this->info("Navigating to subcategory: $subcategoryName ($subcategoryLink)");

                    $subcategoryCrawler = $client->request('GET', $subcategoryLink);

                    $this->info("Scraping products from subcategory: $subcategoryName");

                    $subcategoryCrawler->filter('div.product-layout')->each(function ($node) use ($subCategory, $category, $client, &$imageCounter) {
                        $productName = $node->filter('div.name > a')->text();
                        $productLink = $node->filter('div.name > a')->attr('href');
                        $productImageSet = $node->filter('div.image > a > div > img')->attr('srcset');
                        $productDescription = $node->filter('div.description')->text();

                        // Extract the price using regex
                        $priceText = $node->filter('div.price > span.price-tax')->text();
                        preg_match('/S\.R\s*(\d+(?:,\d+)*(?:\.\d+)?)/u', $priceText, $matches);
                        $productPrice = isset($matches[1]) ? floatval(str_replace(',', '', $matches[1])) : null;

                        // Calculate 15% of the price and add it to the original price
                        $priceWithVAT = $productPrice * (1 + 0.15);
                        $priceWithVAT = number_format($priceWithVAT, 2, '.', '');

                        // Parse the srcset attribute to get the highest quality image URL
                        $imageUrls = explode(',', $productImageSet);
                        $highestQualityImage = trim(end($imageUrls));
                        $highestQualityImage = explode(' ', $highestQualityImage)[0];

                        // Navigate to the product details page to get the brand name
                        $productDetailsCrawler = $client->request('GET', $productLink);
                        $brandNode = $productDetailsCrawler->filter('div.brand-image.product-manufacturer > a > span');
                        $brandName = $brandNode->count() ? $brandNode->text() : 'Unknown';

                        $brand = Brand::firstOrCreate(['name' => $brandName, 'image' => '']);
                        $this->info("Brand name: $brandName for product $productName");

                        $existingProduct = Product::where('title', $productName)
                            ->where('category_id', $category->id)
                            ->where('subcategory_id', $subCategory->id)
                            ->where('brand_id', $brand->id)
                            ->first();

                        if (!$existingProduct) {
                            // Download the highest quality image and save it locally
                            $imageContent = file_get_contents($highestQualityImage);
                            $imageName = $imageCounter . '.png';
                            $savePath = public_path('product_img') . DIRECTORY_SEPARATOR . $imageName;
                            File::put($savePath, $imageContent);
                            $imageCounter++;

                            // Save the product details to the database
                            $product = Product::create([
                                'title' => $productName,
                                'price' => $priceWithVAT,
                                'description' => $productDescription,
                                'category_id' => $category->id,
                                'subcategory_id' => $subCategory->id,
                                'brand_id' => $brand->id,
                                'image' => '/' . $imageName,
                                'quantity' => 100
                            ]);
                        }
                    });
                });
            }
        });

        $this->info('Scraping process completed.');
    }
}

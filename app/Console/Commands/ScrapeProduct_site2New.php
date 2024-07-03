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
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:product_site2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape product details from Asrar website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Starting the scraping process...');

        $client = new Client();
        $url = 'https://www.asrar-co.com';
        $crawler = $client->request('GET', $url);

        // Get all categories and subcategories
        $crawler->filter('#main-menu > ul > li.menu-item.main-menu-item.multi-level.dropdown.drop-menu')->each(function ($node) use ($client) {
            $categoryName = $node->filter('a > span.links-text')->text();

            // Skip the category "العروض"
            if ($categoryName === 'العروض') {
                return;
            }

            // Check for duplicate category before storing it
            $category = Category::firstOrCreate(['name' => $categoryName]);

            $dropdownMenu = $node->filter('.dropdown-menu');
            if ($dropdownMenu->count() > 0) {
                $dropdownMenu->filter('ul.j-menu > li.menu-item')->each(function ($subNode) use ($client, $category) {
                    $subcategoryName = $subNode->filter('a > span.links-text')->text();
                    $subcategoryLink = $subNode->filter('a')->attr('href');

                    // Check for duplicate subcategory before storing it
                    $subCategory = SubCategory::firstOrCreate(['name' => $subcategoryName, 'categoryId' => $category->id]);

                    // Log subcategory link
                    $this->info("Navigating to subcategory: $subcategoryName ($subcategoryLink)");

                    // Navigate to the subcategory link and scrape products
                    $subcategoryCrawler = $client->request('GET', $subcategoryLink);

                    // Log the subcategory page
                    $this->info("Scraping products from subcategory: $subcategoryName");

                    // Get all product details
                    $subcategoryCrawler->filter('div.product-layout')->each(function ($node) use ($subCategory, $category, $client) {
                        $productName = $node->filter('div.name > a')->text();
                        $productLink = $node->filter('div.name > a')->attr('href');
                        $productImage = $node->filter('div.image > a > div > img')->attr('src');
                        $productDescription = $node->filter('div.description')->text();

                        // Extract the price using regex
                        $priceText = $node->filter('div.price > span.price-tax')->text();
                        preg_match('/S\.R\s*(\d+(?:,\d+)*(?:\.\d+)?)/u', $priceText, $matches);
                        $productPrice = isset($matches[1]) ? floatval(str_replace(',', '', $matches[1])) : null;

                        // Calculate 15% of the price and add it to the original price
                        $priceWithVAT = $productPrice * (1 + 0.15);
                        $priceWithVAT = number_format($priceWithVAT, 2, '.', '');

                        // Navigate to the product details page to get the brand name
                        $productDetailsCrawler = $client->request('GET', $productLink);
                        $brandNode = $productDetailsCrawler->filter('div.brand-image.product-manufacturer > a > span');
                        $brandName = $brandNode->count() ? $brandNode->text() : 'Unknown'; 

                        // Check for duplicate brand before storing it
                        $brand = Brand::firstOrCreate(['name' => $brandName, 'image' => '']);
                        // Log the brand name
                        $this->info("Brand name: $brandName for product $productName");

                        // Check if the product already exists in the database
                        $existingProduct = Product::where('title', $productName)
                            ->where('category_id', $category->id)
                            ->where('subcategory_id', $subCategory->id)
                            ->where('brand_id', $brand->id)
                            ->first();

                        if (!$existingProduct) {
                            // Download the image and save it locally
                            $imageContent = file_get_contents($productImage);
                            $imageName = basename($productImage);
                            $savePath = public_path('product_img') . DIRECTORY_SEPARATOR . $imageName;
                            File::put($savePath, $imageContent);

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

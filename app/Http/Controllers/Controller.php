<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChecOut;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function Index(){
        return view('welcome');
    }

    function Home()
    {
        $randomProducts = Product::inRandomOrder()->limit(10)->get();

        // Fetch unique categories IDs to avoid repetition
        $uniqueCategoryIds = Category::inRandomOrder()->take(7)->pluck('id');

        // Initialize an array to hold the categories with their products
        $categoriesWithProducts = [];
        $categories = Category::all();

        foreach ($uniqueCategoryIds as $categoryId) {
            $category = Category::where('id', $categoryId)
                ->with(['products' => function ($query) {
                    $query->inRandomOrder()->limit(10);
                }])->first();

            if ($category) {
                $categoriesWithProducts[] = $category;
            }
        }

        // Prepare variables for view. 'randomProducts' is already included here.
        $viewData = [
            'randomProducts' => $randomProducts,
            'categories' => $categories
        ];

        // Assign categories to their respective view variables
        $categoryNames = ['firstCategory', 'SecoundCategory', 'ThirdCategory', 'FourthCategory', 'FifthCategory', 'SixthCategory', 'SeventhCategory'];
        foreach ($categoriesWithProducts as $index => $category) {
            if (isset($categoryNames[$index])) {
                $viewData[$categoryNames[$index]] = $category;
            }
        }

        // Spread the $viewData array to pass each item as its own variable to the view, including 'randomProducts'
        return view('Home')->with($viewData);
    }

    public function checkLoginStatus()
    {
        $isLoggedIn = Auth::check(); // Returns true if user is logged in, false otherwise
        return response()->json(['isLoggedIn' => $isLoggedIn]);
    }

    function MyOrder()
    {
        $userId = Auth::id(); // Get the authenticated user's id
        $orders = ChecOut::where('user_id', $userId)->get(); // Adjust based on your needs, e.g., filtering by user

        $ordersWithProducts = $orders->map(function ($order) {
            // Parse product IDs and quantities
            $productIds = explode(',', $order->product_id);
            $quantities = explode(',', $order->quantity);

            // Fetch products and attach quantities
            $products = Product::findMany($productIds)->map(function ($product) use (&$quantities, &$productIds) {
                $index = array_search($product->id, $productIds);
                $product->quantity = $quantities[$index] ?? 0;
                return $product;
            });

            $order->products = $products;
            return $order;
        });

        return view('MyOrder')->with('ordersWithProducts',$ordersWithProducts);
    }

   
     public function logMaxExecutionTime()
    {
        $maxExecutionTime = ini_get('max_execution_time');
        Log::info('Max Execution Time: ' . $maxExecutionTime . ' seconds');

          return response()->json([
            'message' => 'Max Execution Time logged successfully.',
            'max_execution_time' => $maxExecutionTime
        ]);
    }


}

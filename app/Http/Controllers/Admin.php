<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChecOut;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Admin extends Controller
{

    public function Dashboard()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $now = Carbon::now();
    
        $ordersThisMonthCount = ChecOut::whereBetween('created_at', [$startOfMonth, $now])->count();
        $sumOfPricesThisMonth = ChecOut::whereBetween('created_at', [$startOfMonth, $now])->sum('price');
        $totalProductsCount = Product::count();
        $totalUserCount = User::whereNull('is_admin')->count();
    
        $salesData = $this->getWeeklySalesData();
        $orderData = $this->getWeeklyOrderData();
        $topSellingProducts = Product::orderBy('sales', 'desc')->take(5)->get();
    
        // Fetch top search queries
        $topSearch = DB::table('search_queries')
                        ->select('query', 'search_count')
                        ->orderBy('search_count', 'desc')
                        ->get();
    
        return view('AdminDashboard/AdminDash', compact(
            'ordersThisMonthCount', 
            'topSellingProducts', 
            'sumOfPricesThisMonth', 
            'totalProductsCount', 
            'orderData', 
            'totalUserCount', 
            'salesData',
            'topSearch' // Pass the top search queries to the view
        ));
    }

    public function getWeeklySalesData()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $endOfWeek = Carbon::now()->endOfWeek()->format('Y-m-d');

        $dailySalesData = ChecOut::select(
            DB::raw('SUM(price) as total_sales'),
            DB::raw('DATE(created_at) as date'))
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $dates = $dailySalesData->pluck('date');
        $sales = $dailySalesData->pluck('total_sales');

        // Prepare labels for all days in the week to ensure consistency
        $daysOfWeek = [];
        for ($day = Carbon::now()->startOfWeek(); $day <= Carbon::now()->endOfWeek(); $day->addDay()) {
            $daysOfWeek[] = $day->format('Y-m-d');
        }

        $dailySales = array_fill_keys($daysOfWeek, 0);
        foreach ($dailySalesData as $data) {
            $dailySales[$data->date] = $data->total_sales;
        }

        return ['days' => array_keys($dailySales), 'sales' => array_values($dailySales)];
    }

    public function getWeeklyOrderData()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $endOfWeek = Carbon::now()->endOfWeek()->format('Y-m-d');

        $dailyOrderData = ChecOut::select(
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('DATE(created_at) as date'))
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $dates = $dailyOrderData->pluck('date');
        $orders = $dailyOrderData->pluck('total_orders');

        // Ensure all days of the week are represented
        $daysOfWeek = [];
        for ($day = Carbon::now()->startOfWeek(); $day <= Carbon::now()->endOfWeek(); $day->addDay()) {
            $daysOfWeek[] = $day->format('Y-m-d');
        }

        $dailyOrders = array_fill_keys($daysOfWeek, 0);
        foreach ($dailyOrderData as $data) {
            $dailyOrders[$data->date] = $data->total_orders;
        }

        return ['days' => array_keys($dailyOrders), 'orders' => array_values($dailyOrders)];
    }

    function Order()
    {
        $orders = ChecOut::get(); // Adjust based on your needs, e.g., filtering by user    
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
        return view('AdminDashboard/Order')->with('ordersWithProducts', $ordersWithProducts);
    }

    function UserDashboard()
    {
        $users = User::whereNull('is_admin')->get();

        // Pass the users to the view
        return view('AdminDashboard/UserDashboard', compact('users'));
    }

    function Category()
    {
        $categories = Category::withCount('subcategories')->paginate(10);

        return view('AdminDashboard/Category')->with('categories', $categories);
    }

    public function SubCategory()
    {
        $categories = Category::all();

        // Load subcategories with their category and the count of their products
        $subcategories = SubCategory::with('category')
            ->withCount('products') // Assuming you have a 'products' relationship defined in your SubCategory model
            ->paginate(10);

        return view('AdminDashboard/Sub-Category', [
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    function Data()
    {
        return view('AdminDashboard.Data');
    }

    function Product()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        // Fetch all products with their category and subcategory
        $products = Product::with(['category', 'subcategory'])->paginate(10);

        // Pass the products to the view
        return view('AdminDashboard/Product',)->with([
            'products' => $products,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);

    }

    public function CategoryUpdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return response()->json(['success' => 'Category updated successfully!']);
    }

    public function SubCategoryUpdate(Request $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->name = $request->name;
        $subcategory->categoryId = $request->category;
        $subcategory->save();

        return response()->json(['success' => 'Category updated successfully!']);
    }

    public function getSubcategoriesForCategory($categoryId)
    {
        $subcategories = Subcategory::where('categoryId', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function scrapeProducts(Request $request)
    {
        Artisan::call('scrape:product_site_united');
        return redirect()->back()->with('success', 'Product scraping Done.');
    }

    public function ProductUpdate(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            // Update product details
            $product->title = $request->input('name', $product->title);
            $product->description = $request->input('desc', $product->description);
            $product->price = $request->input('price', $product->price);
            $product->quantity = $request->input('quantity', $product->quantity);
            $product->category_id = $request->input('category_id', $product->category_id);
            $product->subcategory_id = $request->input('subcategory_id', $product->subcategory_id);

            // Handle image upload if present
            if ($request->hasFile('image')) {
                // Optionally delete the old image
                if ($product->image) {
                    Storage::delete($product->image);
                }

                // Store new image and update product record
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('Product_img'), $imageName);
                $product->image = $imageName;
            }

            $product->save();

            return response()->json(['success' => true, 'message' => 'Product updated successfully.']);
        } catch (\Exception $e) {
            // Log the error or handle it as per your need
            return response()->json(['success' => false, 'message' => 'Failed to update product.'], 500);
        }
    }

    public function DeleteCategory(Request $request)
    {


        // Find and delete the item
        $item = Category::find($request->id);


        if ($item) {
            $item->delete();

            return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
    }

    public function Config()
    {
        return view('AdminDashboard/Config');
    }

    public function upload(Request $request)
    {
        $imageName = $request->imageName; // The name of the existing image to replace
        $swiperSource = $request->has('swiperType') && !empty($request->swiperType) ? $request->swiperType : 'No';
        $imagePath = public_path('img/' . $imageName);
        $imageType = $request->imageType;
        $directory = 'img';

        // Validate that an image is uploaded
        if ($request->hasFile('newImage') && $request->file('newImage')->isValid()) {

            $image = getimagesize($request->file('newImage')->getPathName());
            $width = $image[0];
            $height = $image[1];

            // Dimension check with a tolerance of ±10px
            if ($swiperSource == 'swiperLarge') {
                $validDimensions = ($width >= 1590 && $width <= 1610) && ($height >= 569 && $height <= 589);
            } else if ($swiperSource == 'swiperPhone') {
                $validDimensions = ($width >= 1090 && $width <= 1110) && ($height >= 725 && $height <= 745);
            } else if ($imageType === 'brand') {
                $validDimensions = ($width >= 150 && $width <= 350) && ($height >= 80 && $height <= 320);
                $imagePath = public_path('img/brands/' . $imageName);
                $directory = 'img/brands';
            } else {
                // Invalid swiper source
                return response()->json(['error' => 'Invalid swiper source.', 'code' => 400]);
            }

            if ($validDimensions) {
                // Delete the existing image if it exists
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }

                // Move the new image to replace the old one
                $request->file('newImage')->move(public_path($directory), $imageName);

                // Response for successful upload and dimension check
                return response()->json(['success' => 'Image updated successfully.', 'code' => 200]);
            } else {
                // Response if image dimensions do not meet the specified criteria
                return response()->json(['error' => 'Image dimensions are not within the allowed range.', 'code' => 422]);
            }
        }

        return response()->json(['error' => 'Invalid image upload.', 'code' => 400]);
    }

    public function scrapeProductSite2(Request $request)
    {
        set_time_limit(0);
        Artisan::call('scrape:product_site2');
        return redirect()->back()->with('success', 'Scraping started!');
    }
}

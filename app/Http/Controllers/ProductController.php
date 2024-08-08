<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\SubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function Product(Request $request, $title, $id)
    {
        // Fetch all products that belong to the category with the given $id
        $products = Product::where('category_id', $id)->paginate(20);
        $randomCategories = Category::wherenot('id', $id)->inRandomOrder()->limit(5)->get();
        $randomSubCategories = SubCategory::where('categoryId', $id)->inRandomOrder()->limit(5)->get();
        $categories = Category::with('subcategories')->get();

        // Pass the products to the view
        return view('Products', [
            'products' => $products,
            'title' => $title,
            'randomCategories' => $randomCategories,
            'randomSubCategories' => $randomSubCategories,
            'categories' => $categories,
            'id' => $id,
            'category_id' => $id,
            'subcategory_id' => 0,

        ]);
    }


    public function showByBrand($brandName)
    {

        $brand = Brand::where('name', $brandName)->first();

        if (!$brand) {

            abort(404, 'العلامة التجارية غير موجودة');
        }


        $products = $brand->products()->paginate(10);

        $title = $brandName;

        return view('byBrand', compact('products', 'title'));
    }


    public function SubProduct(Request $request, $category, $title, $id)
    {
        // Fetch all products that belong to the category with the given $id
        $products = Product::where('subcategory_id', $id)->paginate(20);
        $category_id = SubCategory::where('id', $id)->select('categoryID')->first();
        $randomCategories = Category::wherenot('id', $id)->inRandomOrder()->limit(5)->get();
        $randomSubCategories = SubCategory::wherenot('name', $title)->where('categoryId', $id)->inRandomOrder()->limit(5)->get();
        $categories = Category::with('subcategories')->get();

        // Pass the products to the view
        return view('Products', [
            'products' => $products,
            'title' => $title,
            'randomCategories' => $randomCategories,
            'randomSubCategories' => $randomSubCategories,
            'categories' => $categories,
            'category_id' => $category_id->categoryID,
            'subcategory_id' => $id,

        ]);
    }

    function ProductDetails(Request $request, $title, $id)
    {

        $products = Product::where('id', $id)->first();

        return view('ProductDetails', [
            'products' => $products,
            'title' => $title,
        ]);

    }

    // function Category($title, $id)
    // {
    //     $categories = Category::all();
    //     $categoryProducts = Category::find($id)->products;
    //     $category_Subcategories = Category::find($id)->subcategories;

    //     $s_categories = Category::find($categoryProducts[0]->category_id)->subcategories;

    //     $category_name = Category::find((SubCategory::find($id)->categoryId))->name;
    //     $subCategory_name = SubCategory::find($id)->name;

    //     $category_name = Category::find($id)->name;

    //     return view('Products', compact('categoryProducts', 'category_Subcategories', 'category_name', 'categories','s_categories'));
    // }

    // function SubCategory($id)
    // {
    //     $categories = Category::all();
    //     $subcategory_products = SubCategory::find($id)->products;

    //     $otherSubcategories = SubCategory::where('categoryId', $subcategory_products[0]->category_id)->where('id', '!=', $subcategory_products[0]->subcategory_id)->get();

    //     $category_name = Category::find((SubCategory::find($id)->categoryId))->name;
    //     $subCategory_name = SubCategory::find($id)->name;


    //     return view('Products', compact('subcategory_products', 'subCategory_name', 'category_name', 'categories', 'otherSubcategories'));
    // }

    // function ProductDetails($id)
    // {

    //     $targetedProduct = Product::find($id);
    //     $categories = Category::all();
    //     return view('ProductDetails', compact("categories", 'targetedProduct'));
    // }

    public function StoreCategory(Request $request)
    {
        try {
            // Check if a category with the given name already exists
            $existingCategory = Category::where('name', $request->name)->first();

            if ($existingCategory) {
                // If a category with this name exists, return with an error message
                return back()->with('error', 'التصنيف موجود مسبقاً، الرجاء اختيار اسم آخر.');
            }

            // If not, proceed to create and save the new category
            $category = new Category; // Create a new instance of the Category model
            $category->name = $request->name; // Assign the name from the request to the category's name property

            $category->save(); // Save the category to the database
            return back()->with('success', 'تمت إضافة التصنيف بنجاح');
        } catch (QueryException $e) {
            // Handle any query exceptions that occur during the operation
            return back()->with('error', 'حدث خطأ أثناء العملية، الرجاء المحاولة مرة أخرى');
        }
    }

    public function StoreSubCategory(Request $request)
    {
        try {

            // Check if a category with the given name already exists
            $existingCategory = SubCategory::where('name', $request->name)->where('categoryId', $request->category)->first();

            if ($existingCategory) {
                // If a category with this name exists, return with an error message
                return back()->with('error', 'التصنيف الفرعي موجود مسبقاً، الرجاء اختيار اسم آخر.');
            }

            // If not, proceed to create and save the new category
            $category = new SubCategory; // Create a new instance of the Category model
            $category->name = $request->name; // Assign the name from the request to the category's name property
            $category->categoryId = $request->category; // Assign the name from the request to the category's name property

            $category->save(); // Save the category to the database

            return back()->with('success', 'تمت إضافة التصنيف الفرعي بنجاح');
        } catch (QueryException $e) {
            // Handle any query exceptions that occur during the operation
            return back()->with('error', 'حدث خطأ أثناء العملية، الرجاء المحاولة مرة أخرى');
        }
    }

    public function ApiCategory(Request $request)
    {
        $categories = Category::all(); // Assuming you have a Category model set up
        return response()->json($categories);
    }

    public function ApiSubCategory($id, Request $request)
    {
        // Assuming your SubCategory model has a 'category_id' foreign key
        $subcategories = SubCategory::where('categoryId', $id)->get();
        return response()->json($subcategories);
    }

    public function StoreProduct(Request $request)
    {
        try {
            // Directly using request data without validation
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('Product_img'), $imageName);
            }

            // Create the Product
            $product = new Product([
                'title' => $request->title,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'image' => $imageName,
            ]);

            $product->save();

            return back()->with('success', 'تمت إضافة المنتج بنجاح .');
        } catch (\Exception $e) {
            // Logging the exception
            // Log::error($e->getMessage());

            // Returning back with an error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        try {
            $query = $request->input('query');
            $keywords = explode(' ', $query);

            $products = Product::where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->where(function ($subQuery) use ($keyword) {
                        $subQuery->where('title', 'LIKE', "%{$keyword}%")
                            ->orWhere('description', 'LIKE', "%{$keyword}%");
                    });
                }
            })
                ->limit(12)
                ->get();

            $uniqueProducts = $products->unique(function ($product) {
                return $product['title'] . $product['description'];
            })->values();

            return response()->json($uniqueProducts);
        } catch (\Exception $e) {
            Log::error("Error during product search: " . $e->getMessage());
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function sortProducts(Request $request)
    {
        $sortBy = $request->query('sort_by');
        $categoryId = $request->query('category_id'); // Assuming these are strings
        $subcategoryId = $request->query('subcategory_id'); // Assuming these are strings

        // Initialize the query builder
        $productsQuery = Product::query();

        // Decide whether to filter by subcategory or category
        if (!empty($subcategoryId) && $subcategoryId !== '0') {
            $productsQuery->where('subcategory_id', $subcategoryId);
        } else {
            // Filter by category ID
            $productsQuery->where('category_id', $categoryId);
        }

        // Apply sorting based on the sort_by parameter
        switch ($sortBy) {
            case 'best_selling':
                $productsQuery->orderBy('sales', 'desc');
                break;
            case 'alpha_asc':
                $productsQuery->orderBy('title', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'date_asc':
                $productsQuery->orderBy('created_at', 'asc');
                break;
            case 'date_desc':
                $productsQuery->orderBy('created_at', 'desc');
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc');
        }

        $products = $productsQuery->get();

        return response()->json(['products' => $products]);
    }
    
    public function updateQuantity(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'quantity' => 'required|integer|min:0',
        ]);
    
        $product = Product::where('title', $request->input('product_name'))->first();
    
        if ($product) {
            $product->quantity = $request->input('quantity');
            $product->save();
    
            return back()->with('success', 'تم تحديث الكمية بنجاح.');
        } else {
            return back()->with('error', 'لم يتم العثور على المنتج.');
        }
    }
    public function searchProducts(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'like', "%$query%")
            ->get(['title', 'image']) // Fetch necessary fields
            ->map(function($product) {
                // Generate full image URL
                $product->image_url = strpos($product->image, 'https://') !== false 
                    ? $product->image 
                    : asset('Product_img/' . $product->image);
                return $product;
            });
    
        return response()->json($products);
    }


}

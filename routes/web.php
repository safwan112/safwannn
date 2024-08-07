<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChecOutController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Login;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SearchController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['check.expiry'])->group(function () {
    Route::get('/', [Controller::class, 'Index'])->name('/');

    Route::get('/Home', [Controller::class, 'Home'])->name('Home');


    Route::match(['get', 'post'], '/Register', [Login::class, 'Register'])->name('Register');

    Route::match(['get', 'post'], '/Login', [Login::class, 'Login'])->name('Login');

    Route::match(['get', 'post'], '/Logout', [Login::class, 'Logout'])->name('Logout');

    Route::match(['get', 'post'], '/ResetPassword', [Login::class, 'ResetPassword'])->name('ResetPassword');

    Route::match(['get', 'post'], '/StoreUser', [Login::class, 'StoreUser'])->name('StoreUser');

    Route::match(['get', 'post'], '/SendResetPassword', [Login::class, 'SendResetPassword'])->name('SendResetPassword');

    Route::match(['get', 'post'], '/SetNewPassword/{token}', [Login::class, 'SetNewPassword'])->name('SetNewPassword');

    Route::match(['get', 'post'], '/StoreNewPassword', [Login::class, 'StoreNewPassword'])->name('StoreNewPassword');

    Route::match(['get', 'post'], '/login-status', [Controller::class, 'checkLoginStatus']);

    Route::match(['get', 'post'], '/add-to-cart', [CartController::class, 'addToCart'])->name('AddToCart')->middleware('auth');

    Route::match(['get', 'post'], '/cart-count', [CartController::class, 'count'])->name('CartCount')->middleware('auth');

    Route::match(['get', 'post'], '/cart-contents', [CartController::class, 'getCartContents'])->name('CartContents')->middleware('auth');

    Route::match(['get', 'post'], '/update-cart-quantity', [CartController::class, 'updateQuantity'])->name('CartUpdateQuantity');

    Route::match(['get', 'post'], '/remove-from-cart', [CartController::class, 'removeFromCart'])->name('RemoveFromCart');

    Route::match(['get', 'post'], '/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');

    Route::match(['get', 'post'], '/Product/{Category}/{id}', [ProductController::class, 'Product']);

    Route::match(['get', 'post'], '/SubProduct/{Category}/{SubCategory}/{id}', [ProductController::class, 'SubProduct'])->name('SubProduct');


    Route::get('/privacy-policy', function () {
        return view('privacy-policy');
    });
    Route::get('/terms-of-use', function () {
        return view('terms-of-use');
    });
    Route::get('/exchange-and-return-policy', function () {
        return view('exchange-and-return-policy');
    });
    Route::get('/Contact-us', function () {
        return view('Contact-us');
    });


    Route::get('/products/brand/{brandName}', [ProductController::class, 'showByBrand']);
    Route::get('/brands', [BrandController::class, 'index'])->name('brands');


    Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.show');
    Route::get('/payment/callback/{order_id?}', [PaymentController::class, 'callback'])->name('payment.callback');
    Route::get('/thanks', [PaymentController::class, 'thanks'])->name('thanks');
    Route::get('/failed', [PaymentController::class, 'failed'])->name('failed');
    Route::post('/payment', function () {
        return view('payment');
    })->name('payment.page');

    Route::get('/saveSearchQuery', [SearchController::class, 'saveSearchQuery']);

    Route::match(['get', 'post'], '/ProductDetails/{title}/{id}', [ProductController::class, 'ProductDetails'])->name('ProductDetails');

    Route::match(['get', 'post'], '/CheckOut', [CartController::class, 'CheckOut'])->name('CheckOut');

    Route::match(['get', 'post'], '/CheckOut/Items', [CartController::class, 'getItems'])->name('CheckOutItems');

    Route::match(['get', 'post'], '/StoreOrder', [ChecOutController::class, 'StoreOrder'])->name('StoreOrder');

    Route::match(['get', 'post'], '/MyOrder', [Controller::class, 'MyOrder'])->name('MyOrder');

    Route::get('/products/sort', [ProductController::class, 'sortProducts'])->name('products.sort');

    Route::get('/searchproduct', [ProductController::class, 'search'])->name('searchproduct');

// web.php
    Route::get('/sort-products', [ProductController::class, 'sortProducts']);


// Admin Route


    Route::prefix('Admin')->middleware(['auth', 'is_admin'])->group(function () {

        Route::match(['get', 'post'], '/Dashboard', [Admin::class, 'Dashboard'])->name('Dashboard');

        Route::match(['get', 'post'], '/Category', [Admin::class, 'Category'])->name('Category');

        Route::match(['get', 'post'], '/Sub-Categ', [Admin::class, 'SubCategory'])->name('Sub-Categ');

        Route::match(['get', 'post'], '/Product', [Admin::class, 'Product'])->name('Product');

        Route::match(['get', 'post'], '/UserDash', [Admin::class, 'UserDashboard'])->name('UserDash');

        Route::match(['get', 'post'], '/Order', [Admin::class, 'Order'])->name('Order');

        Route::match(['get', 'post'], '/StoreCategory', [ProductController::class, 'StoreCategory'])->name('StoreCategory');

        Route::match(['get', 'post'], '/StoreSubCategory', [ProductController::class, 'StoreSubCategory'])->name('StoreSubCategory');

        Route::match(['get', 'post'], '/api/categories', [ProductController::class, 'ApiCategory'])->name('api.categories');

        Route::match(['get', 'post'], '/api/categories/{id}/subcategories', [ProductController::class, 'ApiSubCategory'])->name('api.subcategories');

        Route::match(['get', 'post'], '/StoreProduct', [ProductController::class, 'StoreProduct'])->name('StoreProduct');

        Route::match(['get', 'post'], '/CategoryUpdate/{id}', [Admin::class, 'CategoryUpdate'])->name('CategoryUpdate');

        Route::match(['get', 'post'], '/SubCategoryUpdate/{id}', [Admin::class, 'SubCategoryUpdate'])->name('SubCategoryUpdate');

        Route::match(['get', 'post'], '/ProductUpdate/{id}', [Admin::class, 'ProductUpdate'])->name('ProductUpdate');

        Route::match(['get', 'post'], '/subcategories-for-category/{id}', [Admin::class, 'getSubcategoriesForCategory'])->name('getSubcategoriesForCategory');

        Route::match(['get', 'post'], '/DeleteCategory', [Admin::class, 'DeleteCategory'])->name('DeleteCategory');

        Route::match(['get', 'post'], '/Config', [Admin::class, 'Config'])->name('Config');

        Route::match(['get', 'post'], '/Data', [Admin::class, 'Data'])->name('Data');

        Route::post('/upload-image', [Admin::class, 'upload'])->name('image.upload');
    });


    Route::post('/admin/scrape', [Admin::class, 'scrapeProductSite2'])->name('admin.scrape');
    Route::post('/admin/scrape-products', [Admin::class, 'scrapeProducts'])->name('admin.scrape-products');

});

Route::POST('/delete-all-data', [Controller::class, 'deleteAllData']);

Route::get('/log-max-execution-time', [Controller::class, 'logMaxExecutionTime']);


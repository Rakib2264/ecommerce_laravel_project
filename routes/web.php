<?php

use App\Http\Controllers\Admin\CategoryContrller;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderContrller;
use App\Http\Controllers\Admin\ProductContrller;
use App\Http\Controllers\Admin\SubCategoryContrller;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('user.layouts.template');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/category/{id}/{slug}', 'Category')->name('category');
    Route::get('/product-details/{id}/{slug}', 'singleProduct')->name('singleproduct');
     Route::get('/new-release', 'NewRealease')->name('newrealease');
  });

Route::middleware(['auth', 'role:user'])->group(function () {

    Route::controller(ClientController::class)->group(function (){
        Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
        Route::post('/add-product-to-cart', 'AddProductToCart')->name('addproducttocart');
        Route::get('/shipping-address', 'GetShoppingAddress')->name('getshoppingaddress');
        Route::post('/add-shipping-info', 'AddShoppingAddress')->name('addshoppingaddress');
        Route::post('/place-order', 'PlaceOrder')->name('placeorder');
        Route::get('/checkout', 'Checkout')->name('checkout');
        Route::get('/user-profile', 'userprofile')->name('userprofile');
        Route::get('/user-profile/pending-orders', 'pendingOrders')->name('pendingorders');
        Route::get('/user-profile/history', 'History')->name('history');
        Route::get('/todays-deal', 'TodysDeal')->name('todayesdeal');
        Route::get('/custom-service', 'CustomerService')->name('customerservice');
        Route::get('/remove-cart/{id}', 'RemoveCart')->name('removecart');
    });
});

 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admindashboard');
    });

    Route::controller(CategoryContrller::class)->group(function () {
        Route::get('/admin/all-category', 'index')->name('allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/add-category', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'editCategory')->name('editcategorys');
        Route::post('/admin/update-category/{id}', 'updateCategory')->name('updatecategorys');
        Route::get('/admin/delete-category/{id}', 'deleteCategory')->name('deletecategory');
    });

    Route::controller(SubCategoryContrller::class)->group(function () {
        Route::get('/admin/all-subcategory', 'index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'storeSubCategoryy')->name('storesubcategoriesss');
        Route::get('/admin/edit-subcategory/{id}', 'editSubCategory')->name('editsubcat');
        Route::post('/admin/update-subcategory/{id}', 'updateSubCategory')->name('updatesubcat');
        Route::get('/admin/delete-subcategory/{id}', 'deleteSubCategory')->name('deletesubcat');
    });

    Route::controller(ProductContrller::class)->group(function () {
        Route::get('/admin/all-product', 'index')->name('allproduct');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('/admin/store-product', 'storeProduct')->name('storeproduct');
        Route::get('/admin/editimage-product/{id}', 'editImageProduct')->name('editproductimage');
        Route::post('/admin/updateimage-product/{id}', 'updateImageProduct')->name('updateproductimage');
        Route::get('/admin/edit-product/{id}', 'editProduct')->name('editproduct');
        Route::post('/admin/update-product/{id}', 'updateProduct')->name('updatrproduct');
        Route::get('/admin/delete-product/{id}', 'deleteProduct')->name('deleteproduct');
    });

    Route::controller(OrderContrller::class)->group(function () {
        Route::get('/admin/pending-order', 'index')->name('pendingorder');
        Route::get('/admin/confirmorder/{id}', 'confirmorder')->name('confirmorder');
    });
});

require __DIR__ . '/auth.php';

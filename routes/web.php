<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;



// Route::get('/', function () {
//     return view('home.blade.php');
// });

Route::get('/admin',[AdminController::class, 'index'])->name('admin.dashboard');

// -----------------------fontend Routs---------

Route::get('/',[AppController::class,'index'])->name('home.page');
Route::get('/shop',[ShopController::class,'shop'])->name('shop.page');
Route::get('/product/{slug}',[ShopController::class, 'productDetails'])->name('shop.page.details');

//------------------------Cart Routs------------------------
Route::get('/cart',[CartController::class, 'index'])->name ('cart.page.index');
Route::post('/cart/store',[CartController::class, 'addToCart'])->name ('cart.store');
Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

//------------------------Wishlist------------------------

Route::get('/wishlist',[WishListController::class, 'showWishList'])->name ('wishlist.show');
Route::post('/wishlist/add',[WishListController::class, 'addToWishList'])->name ('wishlist.add');
Route::delete('/wishlist/remove', [WishlistController::class, 'removeFormWishlist'])->name('wishlist.remove');
Route::delete('/wishlist/clear', [WishlistController::class, 'clearWishlist'])->name('wishlist.clear');





Auth::routes();

Route::middleware('auth')->group(function(){

    Route::get('/my-acount',[UserController::class, 'index'])->name('user.index');

});

Route::middleware('auth','auth.admin')->group(function(){


    Route::get('/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');


    Route::resource('products', ProductController::class);
    // Route::resource('protag', ProTagController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);

});
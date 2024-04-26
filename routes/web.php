<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;



// Route::get('/', function () {
//     return view('home.blade.php');
// });

Route::get('/admin',[AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/',[AppController::class,'index'])->name('home.page');
Route::get('/shop',[ShopController::class,'shop'])->name('shop.page');

Auth::routes();

Route::middleware('auth')->group(function(){

    Route::get('/my-acount',[UserController::class, 'index'])->name('user.index');

});

Route::middleware('auth','auth.admin')->group(function(){


    Route::get('/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');


    Route::resource('products', ProductController::class);
    Route::resource('protag', ProTagController::class);
    Route::resource('category', CategoryController::class);

});
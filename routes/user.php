<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CartController;
use App\Http\middleware\ValidUser;
Route::get('/home', [UserController::class, 'homePage'])->name('user.homePage');
Route::get('/usercategories', [CategoryController::class, 'allCategories'])->name('user.categories');
Route::get('/categoryProducts/{category}', [CategoryController::class, 'show'])->name('user.categoryProducts');

Route::get('/userproducts', [ProductController::class, 'allProducts'])->name('user.allproducts');

Route::get('/about', [UserController::class, 'about'])->name('user.about');
Route::get('/contact', [UserController::class, 'contact'])->name('user.contact');

Route::get('/userdashboard', [UserController::class, 'dashboard'])
->name('user.dashboard')->middleware('IsValidUser');

Route::get('/userlogout', [UserController::class, 'userLogout'])->name('user.logout');

Route::post('/registerUser', [UserController::class, 'registerUser'])->name('user.registerUser');
Route::post('/checklogin', [UserController::class, 'checkLogin'])->name('user.checkLogin');
Route::get('/cartIncrease/{id}', [CartController::class, 'cartIncrease'])->name('cart.increase');
Route::get('/cartDecrease/{id}', [CartController::class, 'cartDecrease'])->name('cart.decrease');
Route::get('/cartRemove/{id}', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('user.checkout')->middleware('IsValidUser');
Route::post('/place-order', [CartController::class, 'placeOrder'])->middleware('IsValidUser')->name('place.order');
Route::post('/AddtoCart', [CartController::class, 'addItemToCart'])->name('user.addtocart');


Route::get('/clear-cart', function () {
    session()->forget('cart');

    return 'Cart cleared';
});
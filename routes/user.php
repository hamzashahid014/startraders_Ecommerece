<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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


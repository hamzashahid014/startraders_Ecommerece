<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\middleware\ValidUser;
use App\Http\middleware\AdminMiddleware;
Route::middleware('AdminMiddleware::class')->group(function(){
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admincategories', [CategoryController::class, 'allCategories'])->name('admin.categories');

Route::get('/viewCategory/{category}', [CategoryController::class, 'show'])->name('admin.viewCategory');

Route::get('/deleteCategory/{category}',[CategoryController::class, 'deleteCategory'])->name('admin.deleteCategory');

/// for products CRUD operations
Route::get('/products', [ProductController::class, 'allProducts'])->name('admin.products');

Route::post('/addProduct', [ProductController::class, 'addProduct'])->name('admin.addProduct');
Route::post('/updateProduct', [ProductController::class, 'updateProduct'])->name('admin.updateProduct');
Route::get('/viewProduct/{product}', [ProductController::class, 'showProduct'])->name('admin.viewProduct');

Route::get('/deleteProduct/{product}',[ProductController::class, 'deleteProduct'])->name('admin.deleteProduct');


Route::get('/all-orders',[AdminController::class, 'allOrders'])->name('admin.allOrders');
Route::get('/approved-orders',[AdminController::class, 'approvedOrders'])->name('admin.approvedOrders');
Route::get('/pending-orders',[AdminController::class, 'pendingOrders'])->name('admin.pendingOrders');

Route::get('/accept-order/{order}',[AdminController::class, 'acceptOrder'])->name('admin.acceptOrder');

Route::get('/order-Details/{order}', [AdminController::class, 'orderdetails'])->name('admin.orderdetails');

Route::get('/backffieLogout', [AdminController::class, 'adminLogout'])->name('admin.logout');

Route::get('/createCategory', [CategoryController::class, 'createCategory'])->name('admin.createCategory');

Route::post('/addCategory', [CategoryController::class, 'addCategory'])->name('admin.addCategory');

Route::post('/updateCategory', [CategoryController::class, 'updateCategory'])->name('admin.updateCategory');


});

Route::post('/backofficeLogin', [AdminController::class, 'chkeckAdminLogin'])->name('admin.checkLogin');
Route::get('/backofficeLogin', [AdminController::class, 'loginform'])->name('admin.loginform');








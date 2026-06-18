<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\middleware\ValidUser;
use App\Http\middleware\AdminMiddleware;

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware(AdminMiddleware::class);

Route::get('/admincategories', [CategoryController::class, 'allCategories'])->name('admin.categories')->middleware(AdminMiddleware::class);
Route::post('/backofficeLogin', [AdminController::class, 'chkeckAdminLogin'])->name('admin.checkLogin');
Route::get('/backofficeLogin', [AdminController::class, 'loginform'])->name('admin.loginform');
Route::get('/backffieLogout', [AdminController::class, 'adminLogout'])->name('admin.logout');

Route::get('/createCategory', [CategoryController::class, 'createCategory'])->name('admin.createCategory');

Route::post('/addCategory', [CategoryController::class, 'addCategory'])->name('admin.addCategory');

Route::post('/updateCategory', [CategoryController::class, 'updateCategory'])->name('admin.updateCategory');

Route::get('/viewCategory/{category}', [CategoryController::class, 'show'])->name('admin.viewCategory')->middleware(AdminMiddleware::class);

Route::get('/deleteCategory/{category}',
    [CategoryController::class, 'deleteCategory'])
    ->name('admin.deleteCategory')->middleware(AdminMiddleware::class);

//// for products CRUD operations
Route::get('/products', [ProductController::class, 'allProducts'])->name('admin.products')->middleware(AdminMiddleware::class);

Route::post('/addProduct', [ProductController::class, 'addProduct'])->name('admin.addProduct');
Route::post('/updateProduct', [ProductController::class, 'updateProduct'])->name('admin.updateProduct');
Route::get('/viewProduct/{product}', [ProductController::class, 'showProduct'])->name('admin.viewProduct')->middleware(AdminMiddleware::class);

Route::get('/deleteProduct/{product}',[ProductController::class, 'deleteProduct'])->name('admin.deleteProduct')->middleware(AdminMiddleware::class);


Route::get('/all-orders',[AdminController::class, 'allOrders'])->name('admin.allOrders')->middleware(AdminMiddleware::class);
Route::get('/approved-orders',[AdminController::class, 'approvedOrders'])->name('admin.approvedOrders')->middleware(AdminMiddleware::class);
Route::get('/pending-orders',[AdminController::class, 'pendingOrders'])->name('admin.pendingOrders')->middleware(AdminMiddleware::class);

Route::get('/accept-order/{order}',[AdminController::class, 'acceptOrder'])
->name('admin.acceptOrder')->middleware(AdminMiddleware::class);

Route::get('/order-Details/{order}', [AdminController::class, 'orderdetails'])
->name('admin.orderdetails')->middleware(AdminMiddleware::class);
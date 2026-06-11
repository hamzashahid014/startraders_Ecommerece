<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
require __DIR__.'/user.php';
require __DIR__.'/admin.php';

// Route::get('/', function () {
//  return view('user.home');
// });
Route::get('/', [UserController::class, 'homePage'])->name('user.homePage');
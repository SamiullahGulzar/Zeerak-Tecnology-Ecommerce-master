<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\HomeComtroller;
use App\Http\Controllers\ShopComtroller;

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

Route::get('/', [HomeComtroller::class, 'index']);
Route::get('/shop', [ShopComtroller::class, 'index'])->name('shop');

// Admin routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'authadmin'])->group(function () {
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('home-setting', HomeController::class);
    Route::get('dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard');
});

// users routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user/dashboard');
    })->name('dashboard');
});
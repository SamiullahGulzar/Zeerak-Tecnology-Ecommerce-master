<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;

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
    return view('welcome');
});

Route::resource('product', ProductController::class);

// Admin routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'authadmin'])->group(function () {
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
<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
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

Route::get('', [HomeController::class, 'index'])->name('index');

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');

Route::get('signout', [CustomAuthController::class, 'signout'])->name('signout');

Route::get('category/{categoryTitle}', [ProductsController::class, 'products']);

Route::get('/product/{productId}', [ProductsController::class, 'productPage']);
Route::get('/cart', [ProductsController::class, 'cart'])->name('cart');

Route::get('/profile/orders', [ProfileController::class, 'profileOrders'])->name('profile');
Route::get('/profile/address', [ProfileController::class, 'profileAddress'])->name('profile');

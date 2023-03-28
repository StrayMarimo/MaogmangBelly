<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\GoogleSocialiteController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;


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


Route::get("/", [ProductController::class, 'index']);
Route::get("details/{id}", [ProductController::class, 'details']);
Route::get("search", [ProductController::class, 'searchProduct']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [UserController::class, 'profile']);


// POST Requests

Route::post("add_to_order", [ProductController::class, 'addToOrder']);
Route::post("buy", [CheckoutController::class, 'buy']);
Route::post("checkout_order", [CheckoutController::class, 'checkout']);

// Authentication
Auth::routes([
    'verify' =>true
]);

// Google Auth
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

Route::get('send-mail', [MailController::class, 'index']);

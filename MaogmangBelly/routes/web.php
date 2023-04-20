<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\CheckoutController;
use App\Http\Controllers\Auth\GoogleSocialiteController;
use App\Http\Controllers\Api\V1\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


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

// GET Requests
Route::get("/products", [ProductController::class, 'index']);
Route::get("details/{id}", [ProductController::class, 'details']);
Route::get("search", [ProductController::class, 'searchProduct']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/catering', [HomeController::class, 'catering']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/reservations', [HomeController::class, 'reservations']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/profile', [UserController::class, 'profile']);
Route::get("/order", [CheckoutController::class, 'checkout']);

// POST Requests
Route::post("add_to_order", [ProductController::class, 'addToOrder']);
Route::post("buy", [CheckoutController::class, 'buy']);
Route::post("edit_category", [ProductController::class, 'editCategory']);
Route::post("add_category", [ProductController::class, 'addCategory']);
Route::post("add_product", [ProductController::class, 'addProduct']);
Route::post("cancel_all_orders", [CheckoutController::class, 'cancelAllOrders']);
Route::post("edit_order_qty", [CheckoutController::class, 'editOrderQty']);
Route::post("delete_order_line", [CheckoutController::class, 'deleteOrderLine']);

// Authentication
Auth::routes([
    'verify' =>true
]);

// Google Auth
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

// Mails
Route::get('subscribe_newsletter', [MailController::class, 'index']);
Route::get('mail_contactus', [MailController::class, 'contact']);

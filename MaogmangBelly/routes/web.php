<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\GoogleSocialiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;

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

// PAGES
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/order', [CheckoutController::class, 'checkout'])->name('order');

// PRODUCTS
Route::get("/products", [ProductController::class, 'getProducts'])->name('products');
Route::get('/products/search', [ProductController::class, 'searchProducts'])->name('search');
Route::get("/products/details", [ProductController::class, 'getProductDetails'])->name('product_details');
Route::get("/products/product", [ProductController::class, 'getProduct'])->name('product');
Route::post("products/add", [ProductController::class, 'addProduct'])->name('add_product');
Route::post("/products/delete", [ProductController::class, 'deleteProduct'])->name('delete_product');
Route::post("/products/edit", [ProductController::class, 'editProduct'])->name('edit_product');

// CATEGORIES
Route::get('/categories', [CategoryController::class, 'getCategories'])->name('categories');
Route::post("/categories/add", [CategoryController::class, 'addCategory'])->name('add_category');
Route::post("/categories/edit", [CategoryController::class, 'editCategory'])->name('edit_category');
Route::post("/categories/delete", [CategoryController::class, 'deleteCategory'])->name('delete_category');

// ORDER
Route::post("add_to_order", [OrderController::class, 'addToOrder'])->name('add_order');
Route::post("cancel_all_orders", [OrderController::class, 'cancelAllOrders'])->name('cancel_orders');
Route::post("edit_order_qty", [OrderController::class, 'editOrderQty'])->name('edit_order');
Route::post("delete_order_line", [OrderController::class, 'deleteOrderLine'])->name('delete_order');

//CHECKOUT
Route::post("buy", [CheckoutController::class, 'buy']);
Route::get("map", [MapController::class, 'showMap'])->name('show_map');

// CATERING
Route::get('/catering', [HomeController::class, 'catering'])->name('catering');
Route::get('/checkout_catering', [HomeController::class, 'checkoutCatering'])->name('checkout_catering');

// RESERVATIONS
Route::get('/reservations', [HomeController::class, 'reservations'])->name('reservations');
Route::get('/checkout_reservations', [HomeController::class, 'checkoutReservations'])->name('checkout_reservations');

// Authentication
Auth::routes([
    'verify' => true
]);

// Google Auth
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

// Mails
Route::get('subscribe_newsletter', [MailController::class, 'index']);
Route::get('mail_contactus', [MailController::class, 'contact']);

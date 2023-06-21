<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\GoogleSocialiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderLineController;
use Illuminate\Support\Facades\Auth;

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

// NAVBAR
Route::get('/', [NavbarController::class, 'home'])->name('home');
Route::get('/about', [NavbarController::class, 'about'])->name('about');
Route::get('/contact', [NavbarController::class, 'contact'])->name('contact');
Route::get('/order', [NavbarController::class, 'order'])->name('order');
Route::get('/product/search', [ProductController::class, 'search'])->name('search');

// RESOURCES
Route::get('order_line/{order_id}', [OrderLineController::class, 'index']);
Route::resource('category', CategoryController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('orders', OrderController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('order_line', OrderLineController::class, ['only' => [ 'store', 'update', 'destroy']]);
Route::resource('product', ProductController::class, ['only' => ['index', 'show', 'search', 'store', 'update', 'destroy']]);

//CHECKOUT
Route::post("/buy", [CheckoutController::class, 'buy']);
Route::get("/map", [CheckoutController::class, 'showMap'])->name('show_map');
Route::get("/order_count", [CheckoutController::class, 'getOrderLinesCount']);
Route::get("/available_date", [CheckoutController::class, 'getDateAvailability']);
Route::get('add_order_line', [OrderLineController::class, 'store'])->name('add_orderline');

// CATERING
Route::get('/catering', [NavbarController::class, 'catering'])->name('catering');
Route::get('/checkout_catering', [NavbarController::class, 'checkoutCatering'])->name('checkout_catering');

// RESERVATIONS
Route::get('/reservations', [NavbarController::class, 'reservations'])->name('reservations');
Route::get('/checkout_reservations', [NavbarController::class, 'checkoutReservations'])->name('checkout_reservations');

// Authentication
Auth::routes([ 'verify' => true]);

// USER
Route::get('/profile', [UserController::class, 'profile'])->name('profile');

// Google Auth
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

// Mails
Route::post('subscribe_newsletter', [MailController::class, 'index']);
Route::get('mail_contactus', [MailController::class, 'contact']);
Route::get('admin_mail', [MailController::class, 'adminMail']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

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
Route::get('/login', function () { return view('login');});
Route::get("/", [ProductController::class, 'index']);
Route::get("details/{id}", [ProductController::class, 'details']);
Route::get("search", [ProductController::class, 'searchProduct']);

// POST Requests
Route::post("/login", [UserController::class, 'login']);
Route::post("add_to_order", [ProductController::class, 'addToOrder']);
Route::post("buy", [CheckoutController::class, 'buy']);
Route::post("checkout_order", [CheckoutController::class, 'checkout']);


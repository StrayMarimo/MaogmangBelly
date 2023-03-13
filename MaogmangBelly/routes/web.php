<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/login', function () {
    return view('login');
});

Route::post("/login", [UserController::class, 'login']);
Route::get("/", [ProductController::class, 'index']);
Route::get("details/{id}", [ProductController::class, 'details']);
Route::get("search", [ProductController::class, 'searchProduct']);
Route::post("add_to_order", [ProductController::class, 'addToOrder']);


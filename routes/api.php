<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('Address', AddressController::class)->except(['create', 'edit']);
Route::resource('Users', UserController::class)->except(['create', 'edit']);
Route::resource('Categorys', CategoryController::class)->except(['create', 'edit']);
Route::resource('Products', ProductController::class)->except(['create', 'edit']);
Route::resource('Orders', OrderController::class)->except(['create', 'edit']);
Route::resource('Cards', CardController::class)->except(['create', 'edit']);
Route::resource('Reviews', ReviewController::class)->except(['create', 'edit']);
Route::resource('Payments', PaymentController::class)->except(['create', 'edit']);

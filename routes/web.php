<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderConfirmationController;
use App\Http\Controllers\OrderScreenController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/allItems', [CoffeeController::class, 'getAllItems'])->name('all_items');

Route::get('/checkout', [OrderController::class, 'getOrder'])->name('checkout');

Route::post('/stripePayment', [OrderConfirmationController::class, 'runStripe'])->name('stripePayment');

Route::get('/successfulPayment', [OrderConfirmationController::class, 'successfulPayment'])->name('successfulPayment');

Route::get('/orderHub', [OrderScreenController::class, 'index'])->name('orderHub');
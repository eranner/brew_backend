<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderConfirmationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/allItems', [CoffeeController::class, 'getAllItems'])->name('all_items');

Route::get('/checkout', [OrderController::class, 'getOrder'])->name('checkout');

Route::post('/stripePayment', [OrderConfirmationController::class, 'runStripe'])->name('stripePayment');

Route::get('/successfulPayment', [OrderConfirmationController::class, 'successfulPayment'])->name('successfulPayment');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/allItems', [CoffeeController::class, 'getAllItems'])->name('all_items');

Route::get('/checkout', [OrderController::class, 'getOrder'])->name('checkout');
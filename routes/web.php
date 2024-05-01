<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderConfirmationController;
use App\Http\Controllers\OrderScreenController;
use App\Http\Controllers\InventoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/allItems', [CoffeeController::class, 'getAllItems'])->name('all_items');

Route::get('/checkout', [OrderController::class, 'getOrder'])->name('checkout');

Route::post('/stripePayment', [OrderConfirmationController::class, 'runStripe'])->name('stripePayment');

Route::get('/successfulPayment', [OrderConfirmationController::class, 'successfulPayment'])->name('successfulPayment');

Route::get('/orderHub', [OrderScreenController::class, 'index'])->name('orderHub');

Route::get('/orderFiller', [OrderController::class, 'getUnfilledOrders'])->name('orderFiller');

Route::put('orderFiller/fillOrder/{id}', [OrderController::class ,'itemMade'])->name('fillOrder');
Route::put('orderFiller/pickUpOrder/{id}', [OrderController::class ,'orderPickedUp'])->name('orderPickedUp');

Route::post('addItem/game', [InventoryController::class, 'addGame'])->name('addGame');
Route::post('addItem/coffee', [InventoryController::class, 'addCoffee'])->name('addCoffee');
Route::post('addItem/snack', [InventoryController::class, 'addSnack'])->name('addSnack');
Route::get('/inventory', [InventoryController::class, 'index'])->name('dashboard');
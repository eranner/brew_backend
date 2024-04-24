<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/allItems', [CoffeeController::class, 'getAllItems'])->name('all_items');
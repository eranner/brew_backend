<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\Game;
use App\Models\Snack;

class InventoryController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    public function addGame(Request $request){
        $request->validate(['gameName', 'duration', 'price']);
        $isWorking = $request->has('is_working') ? true : false;

        Game::create([
            'game' => $request->input('gameName'),
            'minutes' => $request->input('minutes'),
            'is_working' => $isWorking,
            'price' => $request->input('price')
        ]);

        return redirect()->route('dashboard')->with('success', 'Game added successfully');
    } 

    public function addCoffee(Request $request){
        $request->validate(['coffee', 'size', 'in_stock', 'price']);
        $inStock = $request->has('in_stock') ? true : false;

        Coffee::create([
            'coffee' => $request->input('coffee'),
            'size' => $request->input('size'),
            'in_stock'=> $inStock,
            'price' => $request->input('price')
        ]);

        return redirect()->route('dashboard')->with('success', 'Coffee added successfully');
    }

    public function addSnack(Request $request){
        $request->validate(['snack', 'in_stock', 'price']);
        $inStock = $request->has('in_stock') ? true : false;

        Snack::create([
            'snack' => $request->input('snack'),
            'in_stock'=> $inStock,
            'price' => $request->input('price')
        ]);

        return redirect()->route('dashboard')->with('success', 'Coffee added successfully');
    }
}



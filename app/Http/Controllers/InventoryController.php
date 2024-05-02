<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\Game;
use App\Models\Snack;

class InventoryController extends Controller
{
    public function index(){
        $inStockCoffee = Coffee::where('in_stock', true)->get();
        $outOfStockCoffee = Coffee::where('in_stock', false)->get();
        $inStockSnacks = Snack::where('in_stock', true)->get();
        $outOfStockSnacks = Snack::where('in_stock', false)->get();
        $workingGames = Game::where('is_working', true)->get();
        $brokenGames = Game::where('is_working', false)->get();
        return view('dashboard', ['inStockCoffee' => $inStockCoffee, 'outOfStockCoffee' =>$outOfStockCoffee, 'inStockSnacks' => $inStockSnacks, 'outOfStockSnacks'=> $outOfStockSnacks, 'workingGames' => $workingGames, 'brokenGames'=> $brokenGames]);
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

    public function updateCoffee(Request $request){
        $id = $request->id;
        $coffee = Coffee::find($id);
    if ($coffee) {
        $coffee->in_stock = false;
        $coffee->save();
        }

        return redirect()->route('dashboard');
}
public function restockCoffee(Request $request){
    $id = $request->id;
    $coffee = Coffee::find($id);
if ($coffee) {
    $coffee->in_stock = true;
    $coffee->save();
    }

    return redirect()->route('dashboard');
}


public function updateSnack(Request $request){
    $id = $request->id;
    $snack = Snack::find($id);
if ($snack) {
    $snack->in_stock = false;
    $snack->save();
    }

    return redirect()->route('dashboard');
}
public function restockSnack(Request $request){
$id = $request->id;
$snack = Snack::find($id);
if ($snack) {
$snack->in_stock = true;
$snack->save();
}

return redirect()->route('dashboard');
}

public function updateGame(Request $request){
    $id = $request->id;
    $game = Game::find($id);
if ($game) {
    $game->is_working = false;
    $game->save();
    }

    return redirect()->route('dashboard');
}
public function restockGame(Request $request){
$id = $request->id;
$game = Game::find($id);
if ($game) {
$game->is_working = true;
$game->save();
}

return redirect()->route('dashboard');
}
}



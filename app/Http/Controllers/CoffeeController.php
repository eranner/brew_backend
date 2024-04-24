<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\Game;
use App\Models\Snack;

class CoffeeController extends Controller
{
    public function getAllItems(Request $request) {
        $coffee = Coffee::where('in_stock', true)->get();
        $snack = Snack::where('in_stock', true)->get();
        $games = Game::where('is_working', true)->get();

        $data = [
            'coffees' => $coffee,
            'snacks' => $snack,
            'games' => $games
        ];
        return response()->json($data);
    }
}

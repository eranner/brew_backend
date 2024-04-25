<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function getOrder(Request $request){
        $order = $request->all(); // Retrieve all query parameters
        return view('checkout')->with('order', $order);
    }
}

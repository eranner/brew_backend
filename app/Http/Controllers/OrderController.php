<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function getOrder(Request $request){
        $order = $request->all(); // Retrieve all query parameters
        return view('checkout')->with('order', $order);
    }

    public function getUnfilledOrders(){
        $orders = Order::where(['is_paid' => true, 'is_complete' => false])->orderBy('created_at', 'asc')->get();
        $completed = Order::where(['is_paid' => true, 'is_complete' =>true])->orderBy('updated_at', 'asc')->get();
        return view('orderFiller', ['orders' =>$orders, 'completed_orders'=>$completed]);
    }

    public function itemMade(Request $request) {
        return view('orderFiller');
    }

    public function itemPickedUp(Request $request){
        return view('orderFiller');
    }
}

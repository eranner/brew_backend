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
        $filled = Order::where(['is_paid' => true, 'is_complete' => true, 'is_picked_up' => false])->get();
        return view('orderFiller', ['orders' =>$orders, 'completed_orders'=>$completed, 'filled'=>$filled]);
    }

    public function itemMade($id) {

        $item = Order::findOrFail($id);
        $item->is_complete = true;
        $item->save();
        return redirect()->route('orderFiller');
    }

    public function orderPickedUp($id){
        $item = Order::findOrFail($id);
        $item->is_picked_up = true;
        $item->save();
        return redirect()->route('orderFiller');
    }
}

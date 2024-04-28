<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderScreenController extends Controller
{
    public function index() {
        $orders = Order::where(['is_paid' => true, 'is_complete' => false])->orderBy('created_at', 'asc')->get();
        $completed = Order::where(['is_paid' => true, 'is_complete' =>true])->orderBy('updated_at', 'asc')->get();
        return view('orderHub',['orders' => $orders, 'completed_orders' => $completed]);
    }
}

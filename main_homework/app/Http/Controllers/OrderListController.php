<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderListController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $orders = $orders->sortByDesc('order_date');

        return view('admin.orderList', compact('orders'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $viewData = [];
        $orders = Order::all();
        $viewData["title"] = __('messages.orders_all');
        $viewData["orders"] = $orders;
        return view('orders.index')->with("viewData", $viewData);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $viewData = [];
        $userId = Auth::user()->getId();
        $user = User::findOrFail($userId);
        $orders = $user->getOrders();
        $viewData["title"] = __('messages.orders_all');
        $viewData["orders"] = $orders;
        return view('orders.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $order = Order::findOrFail($id);
        $viewData["title"] = __('messages.orderNumber') . $order->getId();
        $viewData["subtitle"] = __('messages.orderSubtitle');
        $viewData["order"] = $order;
        return view('orders.show')->with("viewData", $viewData);
    }
}

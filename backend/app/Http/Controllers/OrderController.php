<?php

namespace App\Http\Controllers;

use Shopify\Clients\Rest;
use App\Models\Order;

class OrderController extends Controller
{
    public function getOrders()
    {
        $orders = Order::orderBy('order_number', 'desc')->paginate(6);
        return view('welcome', compact('orders'));
    }
}

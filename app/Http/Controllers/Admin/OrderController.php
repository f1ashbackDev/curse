<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('new_admin.orders',[
            'orders' => Order::all()
        ]);
    }

    public function show($id)
    {
        $orders = Order::find($id);
        $ordersItem = OrderItems::where('order_id', '=', $orders->id)->with('product', 'image')->get();
        return view('new_admin.showOrder',[
            'orders' => $orders,
            'orderItem' => $ordersItem
        ]);
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

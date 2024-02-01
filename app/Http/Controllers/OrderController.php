<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::where('user_id', '=', Auth::id())->get();
        return view('order', [
            'order' => $order
        ]);
    }

    public function store()
    {

    }

    public function create(Request $request): string
    {
        $order = Order::create([
            'user_id' => Auth::id(),
            'price' => $request->price
        ]);

        $orderItem = OrderItems::create([
            'order_id' => $order->id,
            'product_id' => $request->product_id,
            'count' => $request->count
        ]);

        return route('index');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

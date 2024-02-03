<?php

namespace App\Http\Controllers;

use App\Models\Basket;
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

    public function create(): string
    {
        $user_basket = Basket::where('user_id', '=', Auth::id())->get();
        $order = Order::create([
            'user_id' => Auth::id()
        ]);

        foreach ($user_basket as $item)
        {
            OrderItems::create([
               'order_id' => $order->id,
               'product_id' => $item->product_id,
                'count' => $item->count,
                'sum' => $item->count * $item->product_sum
            ]);
        }
        return redirect('/user/orders');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $basket = Basket::with('product', 'productImage')->where('user_id', '=', Auth::id())->get();
        return view('basket', [
            'basket' => $basket
        ]);
    }

    public function addBasket($id)
    {
        $product = Products::where('id', '=', $id)->first();
        $basket = Basket::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'product_sum' => $product->price
        ]);
        return route('indexPage');
    }

    public function clearBasket($id)
    {
        $basket = Basket::find($id);
        $basket->delete();
        return redirect('/basket');
    }
}

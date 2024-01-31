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
}

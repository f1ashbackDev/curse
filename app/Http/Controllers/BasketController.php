<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{

    public function show()
    {
        $basket = Basket::with('products', 'productImage')->where('user_id', '=', Auth::id())->get();
        return view('user.basket', [
            'basket' => $basket
        ]);
    }

    public function store(Request $request, Products $product)
    {
        $basket = Basket::where('product_id', '=', $product->id)->first();
        if($basket != null){
            $basket->count += $request->count;
            $basket->product_sum *= $request->count;
            dd($request->count);
            $basket->save();
        }
        else{
            Basket::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'product_sum' => $product->price * $request->count,
                'count' => $request->count
            ]);
        }
        return redirect()->route('index');
    }

    public function update(Request $request, Basket $basket)
    {
        $basket->update([
            'count' => $request->count,
            'product_sum' => $basket->product_sum * $request->count
        ]);
        return response()->json($request);
    }

    public function delete(Basket $basket)
    {
        $basket->delete();
        return redirect()->route('basket');
    }
}

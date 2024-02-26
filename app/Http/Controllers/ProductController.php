<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products-all', [
            'products' => Products::with('image')->paginate(6)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return view('product', [
            'product' => $product,
            'image' => $product->image
        ]);
    }
}

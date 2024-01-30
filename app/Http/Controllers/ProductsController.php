<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function showProduct()
    {
        $products = Products::with( 'getCategory')
            ->get();

        return view('new_admin.product', [
            'products'=>$products,
            'image'=>Image::with('getProduct')->get()
        ]);
    }

    public function showAddProduct()
    {
        return view('new_admin.addProduct');
    }
}

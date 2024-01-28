<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function showProduct()
    {
        return view('new_admin.product',[
            'products'=> Products::all()
        ]);
    }

    public function showAddProduct()
    {
        return view('new_admin.addProduct');
    }
}

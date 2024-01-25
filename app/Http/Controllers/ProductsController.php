<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function showProduct()
    {

    }

    public function addProductAdmin()
    {
        return view('addProduct');
    }

    public function showProductAdmin()
    {
        return view('adminProducts');
    }

}

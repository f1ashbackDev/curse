<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function showProduct()
    {
        $products = Products::select('id', 'name', 'count', 'description', 'category_id', 'image_id')
            ->with('getImage', 'getCategory')
            ->get();

        return view('new_admin.product', [
           'products'=>$products
        ]);
//        $products = Products::all();
//        $images = Image::find($products->image_id);
//        return view('new_admin.product',[
//            'products'=> $products,
//            'image'=> $images
//        ]);
    }

    public function showAddProduct()
    {
        return view('new_admin.addProduct');
    }
}

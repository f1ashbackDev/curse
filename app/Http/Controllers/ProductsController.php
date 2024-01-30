<?php

namespace App\Http\Controllers;

use App\Models\Catalogs;
use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function showProduct()
    {
        return view('new_admin.product', [
            'products' => Products::with('image', 'category')->get()
        ]);
    }

    public function showAddProduct()
    {
        return view('new_admin.addProduct', [
            'categories' => Catalogs::all()
        ]);
    }

    public function addProduct(Request $request)
    {
        $product = Products::create([
            'name' => $request->name,
            'count' => $request->count,
            'description' => $request->description,
            'category_id' => $request->category
        ]);

        foreach ($request->image as $photo){
            $filename = $photo->store('products', 'public');
            $image = new Image();
            $image->image = $filename;
            $image->products_id = $product->id;
            $image->save();
        }
        return redirect('/admin/products');
    }
}

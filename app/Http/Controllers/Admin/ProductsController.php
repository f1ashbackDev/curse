<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogs;
use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        return view('new_admin.products',[
            'products' => Products::with('image', 'category')->get()
        ]);
    }

    public function create()
    {
        return view('new_admin.products-add', [
           'categories' => Catalogs::all()
        ]);
    }

    public function store(Request $request)
    {
        $product = Products::create([
            'name' => $request->name,
            'count' => $request->count,
            'price' => $request->price,
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
        return redirect()->route('admin.products.index');
    }

    public function edit(Products $products)
    {
        return view('new_admin.products-edit', [
           'products' => $products,
           'image' => $products->image,
           'name_category' => $products->category->categories_name,
            'category' => Catalogs::all()
        ]);
    }

    public function update(Request $request, Products $products)
    {
        $products->update($request->all());
        return redirect()->route('admin.products.index');
    }

    public function delete(Products $products)
    {
        $image = Image::where(['products_id' => $products->id])->get();
        foreach ($image as $item){
            Storage::disk('public')->delete($item->image);
            $item->delete();
        }
        $products->delete();
        return redirect()->route('admin.products.index');
    }
}

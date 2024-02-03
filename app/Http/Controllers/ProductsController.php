<?php

namespace App\Http\Controllers;

use App\Models\Catalogs;
use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
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

    public function showEditProduct($id)
    {
        $product = Products::find($id);
        return view('new_admin.editProduct', [
           'product' => $product,
           'image' => $product->image,
           'name_category' => $product->category->categories_name,
            'category' => Catalogs::all()
        ]);
    }

    public function create(Request $request)
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
        return redirect('/admin/products');
    }

    public function editProduct(Request $request, $id)
    {
        return redirect('/admin/product');
    }

    public function update()
    {

    }

    public function delete($id)
    {
        $image = Products::find($id)->image;
        foreach ($image as $item){
            Storage::disk('public')->delete($item->image);
            $item->delete();
        }
        Products::find($id)->delete();
        return redirect('/admin/products');
    }
}

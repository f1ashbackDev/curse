<?php

namespace App\Http\Controllers;

use App\Models\Catalogs;
use Illuminate\Http\Request;

class CatalogsController extends Controller
{
    // Показ всех категорий товаров
    public function index()
    {
        return view('new_admin.catalogy')->with([
            'category'=>Catalogs::all()
        ]);
    }

    public function showCreateCategories()
    {
        return view('new_admin.createCatalog');
    }

    public function addCategory(Request $request)
    {
        // Замутить проверку перед созданием
        $category = new Catalogs();
        $category->name = $request->name;
        $category->save();
        return redirect('/admin/categories');
    }

    public function editCategory(Request $request)
    {
        Catalogs::update([
            'name'=>$request->name
        ]);
        return redirect('/admin/categories');
    }
}
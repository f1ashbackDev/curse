<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function create()
    {
        return view('new_admin.createCatalog');
    }

    public function store(Request $request)
    {
        $category = new Catalogs();
        $category->categories_name = $request->name;
        $category->save();
        return redirect('/admin/categories');
    }

    public function edit(Catalogs $catalogs)
    {
        return view('new_admin.editCatalogy',[
            'categories' => $catalogs
        ]);
    }

    public function update(Request $request, Catalogs $catalogs)
    {
        $catalogs->update($request->all());
        return redirect()->route('admin.category.index');
    }

    public function destroy(Catalogs $catalogs)
    {
        $catalogs->delete();
        return redirect()->route('admin.category.index');
    }
}

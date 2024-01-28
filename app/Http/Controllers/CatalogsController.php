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

    public function showEditCategories($id)
    {
        $categories = Catalogs::all()->where('id', '=', $id);
        return view('new_admin.editCatalogy',[
            'categories' => $categories
        ]);
    }

    public function addCategory(Request $request)
    {
        // Замутить проверку перед созданием
        $category = new Catalogs();
        $category->categories_name = $request->name;
        $category->save();
        return redirect('/admin/categories');
    }

    public function editCategory($id, Request $request)
    {
        Catalogs::where('id', $id)->update([
            'name'=>$request->name
        ]);
        return redirect('/admin/categories');
    }

    public function deleteCategory(Catalogs $catalogs, $id)
    {
        $catalogs = Catalogs::where('id', $id);
        $catalogs->delete();
        return redirect('/admin/categories');
    }
}

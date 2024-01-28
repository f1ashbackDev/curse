<?php

use App\Http\Controllers\CatalogsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'indexPage'])->name('indexPage');
Route::post('/register',[UserController::class,'register'])->name('register');

Route::get('/admin', function (){
    return view('new_admin.admin');
});

// Админка
Route::get('/admin/addproduct', [ProductsController::class, 'addProductAdmin']);
Route::get('/admin/products', [ProductsController::class, 'showProductAdmin'])->name('productAdmin');
Route::get('/admin/categories', [CatalogsController::class, 'index'])->name('showAllCategoriesAdmin');
Route::get('/admin/addcategories', [CatalogsController::class, 'showCreateCategories'])->name('showCreateCategoriesAdmin');
Route::post('/admin/createcategories', [CatalogsController::class, 'addCategory'])->name('createCategoriesAdmin');

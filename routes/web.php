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
    return view('test');
});

// Админка
Route::get('/admin/addproduct', [ProductsController::class, 'addProductAdmin']);
Route::get('/admin/products', [ProductsController::class, 'showProductAdmin'])->name('productAdmin');
Route::get('/admin/categories', [CatalogsController::class, 'index'])->name('showAllCategoriesAdmin');

<?php

use App\Http\Controllers\AdminController;
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
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Пользователи сайта ( админка )
Route::get('/admin', function (){
    return view('new_admin.admin');
})->name('adminPage');
Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('showUsers');
Route::get('/admin/users/edituser/{id}', [AdminController::class, 'showUpdateUser'])->name('showUpdateUser');
// Продукты
Route::get('/admin/addproduct', [ProductsController::class, 'addProductAdmin']);
Route::get('/admin/products', [ProductsController::class, 'showProduct'])->name('productAdmin');
// Категории
Route::get('/admin/categories', [CatalogsController::class, 'index'])->name('showAllCategoriesAdmin');
Route::get('/admin/addcategories', [CatalogsController::class, 'showCreateCategories'])->name('showCreateCategoriesAdmin');
Route::post('/admin/createcategories', [CatalogsController::class, 'addCategory'])->name('createCategoriesAdmin');
Route::get('/admin/editcategories/{id}', [CatalogsController::class, 'showEditCategories'])->name('editCategories');
Route::post('/admin/updatecategories/{id}', [CatalogsController::class, 'editCategory'])->name('updateCategories');
Route::get('/admin/deletecategories/{id}', [CatalogsController::class, 'deleteCategory'])->name('deleteCategories');

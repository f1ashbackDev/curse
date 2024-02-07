<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CatalogsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
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
Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
Route::get('/basket/remove/{id}', [BasketController::class, 'clearBasket'])->name('clearBasket');
Route::get('/basket/add/{id}', [BasketController::class, 'addBasket'])->name('addBasket');
Route::post('/basket/update/{id}', [BasketController::class, 'update'])->name('updateBasket');
Route::get('/user/order/create', [OrderController::class, 'create'])->name('createOrder');
Route::get('/user/orders', [OrderController::class, 'index'])->name('order');
Route::get('/user/order/{id}', [OrderItemController::class, 'store'])->name('orderItem');



// Пользователи сайта ( админка )
Route::get('/admin', function (){
    return view('new_admin.admin');
})->name('adminPage');
Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('showUsers');
Route::get('/admin/user/edit/{id}', [AdminController::class, 'showUpdateUser'])->name('showUpdateUser');
Route::post('/admin/user/update/{id}', [AdminController::class, 'update'])->name('updateUser');
// Продукты
Route::get('/admin/products', [ProductsController::class, 'index'])->name('productAdmin');
Route::get('/admin/product/add', [ProductsController::class, 'showAddProduct'])->name('showAddProduct');
Route::post('/admin/product/create', [ProductsController::class, 'create'])->name('createProduct');
Route::get('/admin/product/edit/{id}', [ProductsController::class, 'showEditProduct'])->name('editProduct');
Route::get('/admin/product/delete/{id}', [ProductsController::class, 'delete'])->name('deleteProduct');
// Категории
Route::get('/admin/categories', [CatalogsController::class, 'index'])->name('showAllCategoriesAdmin');
Route::get('/admin/categories/add', [CatalogsController::class, 'showCreateCategories'])->name('showCreateCategoriesAdmin');
Route::post('/admin/categories/create', [CatalogsController::class, 'addCategory'])->name('createCategoriesAdmin');
Route::get('/admin/categories/edit/{id}', [CatalogsController::class, 'showEditCategories'])->name('editCategories');
Route::post('/admin/categories/update/{id}', [CatalogsController::class, 'editCategory'])->name('updateCategories');
Route::get('/admin/categories/delete/{id}', [CatalogsController::class, 'deleteCategory'])->name('deleteCategories');
// Заказы сайта
Route::get('/admin/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('ordersAdmin');
Route::get('/admin/orders/{id}',[\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('showOrdersAdmin');
Route::post('/admin/orders/update/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'update'])->name('updateOrdersAdmin');

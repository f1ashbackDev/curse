<?php

use App\Http\Controllers\Admin\CatalogsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
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



Route::prefix('admin')->group(function (){
    Route::get('/', function (){
        return view('new_admin.layout.admin');
    });
    // Пользователи
    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('user/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('user/{user}/update', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
    // Продукты
    Route::get('products/', [ProductsController::class, 'index'])->name('admin.products.index');
    Route::get('products/create', [ProductsController::class, 'create'])->name('admin.products.create');
    Route::post('products/store', [ProductsController::class, 'store'])->name('admin.products.store');
    Route::get('products/{products}/edit', [ProductsController::class, 'edit'])->name('admin.products.edit');
    Route::get('products/{products}/delete', [ProductsController::class, 'delete'])->name('admin.products.delete');
    Route::post('products/{products}/update', [ProductsController::class, 'update'])->name('admin.products.update');
    // Категории
    Route::get('category', [CatalogsController::class, 'index'])->name('admin.category.index');
    Route::get('category/create', [CatalogsController::class, 'create'])->name('admin.category.create');
    Route::post('category/store', [CatalogsController::class, 'store'])->name('admin.category.store');
    Route::get('category/{category}/edit', [CatalogsController::class, 'edit'])->name('admin.category.edit');
    Route::post('category/{category}/update', [CatalogsController::class, 'update'])->name('admin.category.update');
    Route::get('category/{category}/delete', [CatalogsController::class, 'destroy'])->name('admin.category.delete');
    // Заказы пользователей
    Route::get('admin/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('admin/orders/{id}',[\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.orders.show');
    Route::post('admin/orders/update/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'update'])->name('admin.orders.update');
});

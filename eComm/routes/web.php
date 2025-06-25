<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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


Route::view('/register', 'register')->name('register');

Route::post('/registerSave', [UserController::class,'register'])->name('registerSave');


Route::get('logout', function () {

    Session::forget('user');

    return redirect('/login');
 });



Route::view('/login', 'login');

Route::post("/login", [UserController::class, 'login']);

Route::get("/", [ProductController::class, 'index']);


Route::get("detail/{id}", [ProductController::class, 'detail']);

Route::get("search", [ProductController::class, 'search']);


Route::post("add", [ProductController::class, 'addToCart'])->name('addToCart');

Route::get("cartList", [ProductController::class, 'cartList']);

Route::get("removecart/{id}", [ProductController::class, 'removeCart']);

Route::get("ordernow", [ProductController::class, 'orderNow']);

Route::post("orderplace", [ProductController::class, 'orderPlace']);

Route::get("myorder", [ProductController::class, 'myOrder']);

Route::view('/productlist', 'productlist')->name('productlist');

Route::post("/addproduct", [ProductController::class, 'addProduct'])->name('addproduct');

<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController as apiUserController;
use App\Http\Controllers\api\CategoryController as apiCategoryController;
use App\Http\Controllers\api\PostController as apiPostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/user', [apiUserController::class, 'index'])->name('userindex');
Route::post('/login', [apiUserController::class, 'login'])->name('userlogin');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/category', [apiCategoryController::class, 'index'])->name('category');
    Route::get('/ground', [apiCategoryController::class, 'ground'])->name('ground');
    Route::get('/caregory_user/{id}', [apiCategoryController::class, 'showUserCategories'])->name('category.user');

//here is the Post rotue APi

Route::get('/post', [apiPostController::class, 'index'])->name('post.index');

Route::post('/post/store', [apiPostController::class, 'store'])->name('post.store');

Route::put('/post/{id}/edit', [apiPostController::class, 'update'])->name('post.update');
Route::delete('/post/{id}/delete', [apiPostController::class, 'delete'])->name('post.destroy');


Route::get('/post_show/user/{id}', [apiPostController::class, 'showUserpost']);



});

<?php

use App\Http\Middleware\TestUser;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/register', 'register')->name('register');

Route::post('/registerSave', [UserController::class, 'register'])->name('registerSave');

Route::view('/login', 'login')->name('login');

Route::post('/loginMatch', [UserController::class, 'login'])->name('loginMatch');



// //this way we use two or more middleware in single route 
// Route::get('/dashboard', [UserController::class, 'dashboardPage'])->name('dashboard')
// ->middleware([ValidUser::class,TestUser::class]);

// //this way we uss only one middleware in single route 
// Route::get('/dashboard/inner', [UserController::class, 'innerpage'])->name('inner')
// ->middleware(ValidUser::class); 


//In Whic this method use group of route and one or more middleware also rename the middleware

Route::middleware([ValidUser::class,TestUser::class])->group(function(){
    Route::get('/dashboard', [UserController::class, 'dashboardPage'])->name('dashboard');
    
    Route::get('/dashboard/inner', [UserController::class, 'innerpage'])->name('inner'); 

});


Route::get('/logout', [UserController::class, 'logout'])->name('logout');

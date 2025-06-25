<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GroundController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardContainer;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\MarketpalceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AdminLoginController::class, 'index'])->name('admin.login');


Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');


Route::get('/account/order/{id}', [OrderController::class, 'index'])->name('account.order');
Route::post('/account/order/submit', [OrderController::class, 'ordersubmit'])->name('account.order.submit');
Route::get('/account/product/catergory/elctronics', [DashboardContainer::class, 'categoryproducts'])->name('account.product.category.elctronic');

Route::get('/test', [OrderController::class, 'orderlist'])->name('test');

Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
Route::get('/admin/usercreate', [UserController::class, 'create'])->name('admin.usercreate');
Route::post('/admin/processRegister', [UserController::class, 'processRegister'])->name('admin.processRegister');
Route::get('/admin/edit/{id}', [UserController::class, 'useredit'])->name('admin.edit');
Route::post('/admin/updateform/{id}', [UserController::class, 'updateform'])->name('admin.updateform');
Route::delete('/admin/delete/{id}', [UserController::class, 'destroy'])->name('admin.destroyuser');


Route::get('/admin/role', [RoleController::class, 'index'])->name('admin.role');
Route::get('/admin/rolecreate', [RoleController::class, 'create'])->name('admin.rolecreate');
Route::post('/admin/roleprocess', [RoleController::class, 'store'])->name('admin.rolestore');


Route::get('/admin/permission', [PermissionController::class, 'index'])->name('admin.permission');
Route::get('/admin/permissioncreate', [PermissionController::class, 'create'])->name('admin.permissioncreate');
Route::post('/admin/permissionprocess', [PermissionController::class, 'store'])->name('admin.permissionstore');


Route::get('category/list', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/add', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


Route::get('vendor/list', [VendorController::class, 'index'])->name('vendor.index');
Route::get('vendor/add', [VendorController::class, 'create'])->name('vendor.create');
Route::post('vendor/store', [VendorController::class, 'store'])->name('vendor.store');
Route::put('vendor/update/{id}', [VendorController::class, 'update'])->name('vendor.update');
Route::delete('vendor/destroy/{id}', [VendorController::class, 'delete'])->name('vendor.destroy');


Route::get('facility/list', [FacilityController::class, 'index'])->name('facility.index');
Route::get('facility/add', [FacilityController::class, 'create'])->name('facility.create');
Route::post('facility/store', [FacilityController::class, 'store'])->name('facility.store');
Route::put('facility/update/{id}', [FacilityController::class, 'update'])->name('facility.update');
Route::delete('facility/destroy/{id}', [FacilityController::class, 'delete'])->name('facility.destroy');



Route::get('marketplace/list', [MarketpalceController::class, 'index'])->name('marketplace.index');
Route::get('marketplace/add', [MarketpalceController::class, 'create'])->name('market   place.create');
Route::post('marketplace/store', [MarketpalceController::class, 'store'])->name('marketplace.store');
Route::put('marketplace/update/{id}', [MarketpalceController::class, 'update'])->name('marketplace.update');
Route::delete('marketplace/destroy/{id}', [MarketpalceController::class, 'delete'])->name('marketplace.destroy');



Route::get('ground/list', [GroundController::class, 'index'])->name('ground.index');
Route::get('ground/add/{id}', [GroundController::class, 'create'])->name('ground.create');
Route::post('ground/store', [GroundController::class, 'store'])->name('ground.store');

Route::get('ground/editvendor/{id}', [GroundController::class, 'showvendor'])->name('ground.editvendor');
Route::put('ground/updatevendor/{id}', [GroundController::class, 'editvendor'])->name('ground.updatevendor');




Route::get('/ground/groundedit/{id}', [GroundController::class, 'groundedit'])->name('ground.groundedit');
Route::put('ground/updateground/{id}', [GroundController::class, 'groundupdate'])->name('ground.groundupdate');


Route::get('/ground/facililty/{id}', [FacilityController::class, 'groundfacility'])->name('ground.facility');

Route::post('/ground/court/store/{id}', [FacilityController::class, 'courtstore'])->name('ground.court.store');

//Route::put('/court/update/{court}/{ground}', [FacilityController::class, 'courtupdate'])->name('court.update');

Route::put('/court/{court}/ground/{ground}', [FacilityController::class, 'courtupdate'])->name('court.update');



// route are for notifitions

Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index');
Route::get('/notification/create', [NotificationController::class, 'create'])->name('notification.create');
Route::post('/notification/store', [NotificationController::class, 'store'])->name('notification.store');
Route::post('/notification/{$id}/edit', [NotificationController::class, 'update'])->name('notification.update');
Route::post('/notification/{$id}/delete', [NotificationController::class, 'delete'])->name('notification.destroy');


// route are for new

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
Route::put('news/{$id}/edit', [NewsController::class, 'update'])->name('news.update');
Route::delete('/news/{$id}/delete', [NewsController::class, 'delete'])->name('news.destroy');




Route::get('/post', [PostController::class, 'index'])->name('post.index');

Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::put('/post/{id}/edit', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{id}/delete', [PostController::class, 'delete'])->name('post.destroy');










// Route::delete('ground/destroy/{id}', [GroundController::class, 'delete'])->name('ground.destroy');













Route::group(['prefix' => 'account'],function(){

    
   
        Route::get('/login', [LoginController::class, 'index'])->name('account.login');
        Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
        Route::get('/register', [LoginController::class, 'register'])->name('account.register');
        Route::post('/register', [LoginController::class, 'processRegister'])->name('account.processRegister');
    



        Route::get('/dashboard', [DashboardContainer::class, 'index'])->name('account.dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
    
});    


Route::group(['prefix' => 'admin'],function(){

    
    // Route::group(['middleware' => 'admin.guest'], function () {

        


        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
       
    // });


    // Route::group(['middleware' => 'admin.auth'], function () {

       Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

       Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

       


    // });
});    



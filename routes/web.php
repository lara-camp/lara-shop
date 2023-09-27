<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\Product\ProductController;

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
Route::get('admin-backend/login',[LoginController::class,'loginForm'])->name('login');
Route::get('admin-backend/logout',[LoginController::class,'getLogout'])->name('logout');
Route::post('admin-backend/login',[LoginController::class,'postLogin'])->name('postLogin');
Route::group(['prefix' => 'admin-backend','middleware' => 'admin'], function() {
    Route::get('index',[IndexController::class,'index'])->name('backendIndex');
    Route::group(['prefix' => 'product'], function () {
        Route::get('/create',[ProductController::class,'form'])->name('productForm');
        Route::get('/lists',[ProductController::class,'form'])->name('productLists');

    });
});
Auth::routes();


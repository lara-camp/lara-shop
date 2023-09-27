<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\IndexController;
<<<<<<< HEAD
use App\Http\Controllers\Product\ProductController;
=======
use App\Http\Controllers\ProductController;
>>>>>>> 6dc37de7994f9bf13e885f0bdc0e8c1217bda5e3

Route::get('/',[LoginController::class,'loginForm'])->name('login');
Route::get('admin-backend/logout',[LoginController::class,'getLogout'])->name('logout');
Route::post('admin-backend/login',[LoginController::class,'postLogin'])->name('postLogin');

Route::group(['prefix' => 'admin-backend','middleware' => 'admin'], function() {
    Route::get('index',[IndexController::class,'index'])->name('backendIndex');
<<<<<<< HEAD
    Route::group(['prefix' => 'product'], function () {
        Route::get('/create',[ProductController::class,'form'])->name('productForm');
        Route::get('/lists',[ProductController::class,'form'])->name('productLists');

    });
});
Auth::routes();

=======

    Route::prefix('category')->group(function() {
        Route::get('create',[CategoryController::class,'categoryForm']);
        Route::get('list',[CategoryController::class,'categoryList'])->name('categoryList');
        Route::get('edit/{id}',[CategoryController::class,'categoryEdit']);
        Route::get('delete/{id}',[CategoryController::class,'categoryDelete']);
        Route::post('update',[CategoryController::class,'categoryUpdate'])->name('categoryUpdate');
        Route::post('create',[CategoryController::class,'categoryCreate'])->name('categoryCreate');
    });

    Route::prefix('product')->group(function() {
        Route::get('create',[ProductController::class,'productForm']);
        Route::post('create',[ProductController::class,'productCreate'])->name('productCreate');
    });
});

>>>>>>> 6dc37de7994f9bf13e885f0bdc0e8c1217bda5e3

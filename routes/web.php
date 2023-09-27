<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\Product\ProductController;

Route::get('/',[LoginController::class,'loginForm'])->name('login');
Route::get('admin-backend/logout',[LoginController::class,'getLogout'])->name('logout');
Route::post('admin-backend/login',[LoginController::class,'postLogin'])->name('postLogin');

Route::group(['prefix' => 'admin-backend','middleware' => 'admin'], function() {
    Route::get('index',[IndexController::class,'index'])->name('backendIndex');

    Route::prefix('category')->group(function() {
        Route::get('create',[CategoryController::class,'categoryForm']);
        Route::get('list',[CategoryController::class,'categoryList'])->name('categoryList');
        Route::get('edit/{id}',[CategoryController::class,'categoryEdit']);
        Route::get('delete/{id}',[CategoryController::class,'categoryDelete']);
        Route::post('update',[CategoryController::class,'categoryUpdate'])->name('categoryUpdate');
        Route::post('create',[CategoryController::class,'categoryCreate'])->name('categoryCreate');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/create',[ProductController::class,'form'])->name('productForm');
        Route::get('/lists',[ProductController::class,'form'])->name('productLists');

    });
});

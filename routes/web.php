<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\ProductController;

Route::get('admin-backend/login',[LoginController::class,'loginForm'])->name('login');
Route::get('admin-backend/logout',[LoginController::class,'getLogout'])->name('logout');
Route::post('admin-backend/login',[LoginController::class,'postLogin'])->name('postLogin');

Route::group(['prefix' => 'admin-backend','middleware' => 'admin'], function() {
    Route::get('index',[IndexController::class,'index'])->name('backendIndex');

    Route::prefix('category')->group(function() {
        Route::get('create',[CategoryController::class,'categoryForm']);
        route::get('list',[CategoryController::class,'categoryList'])->name('categoryList');
        Route::post('create',[CategoryController::class,'categoryCreate'])->name('categoryCreate');
    });

    Route::prefix('product')->group(function() {
        Route::get('create',[ProductController::class,'productForm']);
        Route::post('create',[ProductController::class,'productCreate'])->name('productCreate');
    });
});


<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\MadeIn\MadeInController;
use App\Http\Controllers\Product\GalleryController;

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\SiteSetting\SiteSettingController;
use App\Http\Controllers\Frontend\Home\FrontendIndexController;
use App\Http\Controllers\Frontend\Product\ProductDetailController;

Route::get('admin-backend/login',[LoginController::class,'loginForm'])->name('login');
Route::post('admin-backend/login',[LoginController::class,'postLogin'])->name('postLogin');

Route::get('/',[FrontendIndexController::class,'frontendIndex']);
Route::get('category',[FrontendIndexController::class,'category']);
Route::get('tracking',[FrontendIndexController::class,'tracking']);
Route::get('blog',[FrontendIndexController::class,'blog']);
Route::get('contact',[FrontendIndexController::class,'contact']);

Route::get('product/detail/{id}',[ProductDetailController::class,'index']);
Route::get('check/user', [FrontendIndexController::class, 'checkUser'])->name('checkUser');
Route::get('user/register', [FrontendIndexController::class, 'registerForm'])->name('registerForm');
Route::post('user/register/store', [FrontendIndexController::class, 'register'])->name('registerStore');


Route::group(['prefix' => 'admin-backend','middleware' => ['admin']], function() {
    Route::get('logout',[LoginController::class,'getLogout'])->name('logout');
    Route::get('index',[IndexController::class,'index'])->name('backendIndex');
    Route::group(['prefix' => 'product'], function () {
        Route::get('create',[ProductController::class,'form'])->name('productForm');
        Route::get('lists',[ProductController::class,'index'])->name('productLists');
        Route::get('edit/{id}',[ProductController::class,'edit']);
        Route::get('delete/{id}',[ProductController::class,'delete']);
        Route::post('create',[ProductController::class,'store'])->name('productCreate');
        Route::post('update',[ProductController::class,'update'])->name('productUpdate');

        Route::group(['prefix' => 'gallery'], function () {
            Route::get('{id}',[GalleryController::class,'galleryCreate'])->name('galleryCreate');
            Route::get('edit/{id}',[GalleryController::class,'galleryEdit']);
            Route::get('delete/{id}',[GalleryController::class,'galleryDelete']);
            Route::post('store',[GalleryController::class,'galleryStore'])->name('galleryStore');
            Route::post('update',[GalleryController::class,'galleryUpdate'])->name('galleryUpdate');
        });
    });

    Route::prefix('category')->group(function() {
        Route::get('create',[CategoryController::class,'categoryForm']);
        Route::get('list',[CategoryController::class,'categoryList'])->name('categoryList');
        Route::get('edit/{id}',[CategoryController::class,'categoryEdit']);
        Route::get('delete/{id}',[CategoryController::class,'categoryDelete']);
        Route::post('update',[CategoryController::class,'categoryUpdate'])->name('categoryUpdate');
        Route::post('create',[CategoryController::class,'categoryCreate'])->name('categoryCreate');
    });
    Route::prefix('made')->group(function() {
        Route::get('create',[MadeInController::class,'madeInForm']);
        Route::get('list',[MadeInController::class,'madeList'])->name('madeList');
        Route::get('edit/{id}',[MadeInController::class,'madeEdit']);
        Route::get('delete/{id}',[MadeInController::class,'madeDelete']);
        Route::post('update',[MadeInController::class,'madeUpdate'])->name('madeUpdate');
        Route::post('create',[MadeInController::class,'madeCreate'])->name('madeCreate');
    });
    Route::get('setting',[SiteSettingController::class,'index'])->name('siteSetting');
    Route::post('setting', [SiteSettingController::class, 'update'])->name('settingUpdate');
});
Auth::routes();

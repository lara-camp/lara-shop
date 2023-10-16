<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use App\Repository\Size\SizeRepository;
use App\Repository\MadeIn\MadeInRepository;
use App\Repository\Product\GalleryRepository;
use App\Repository\Product\ProductRepository;
use App\Repository\Setting\SettingRepository;


use App\Repository\Category\CategoryRepository;
use App\Repository\Size\SizeRepositoryInterface;
use App\Repository\MadeIn\MadeInRepositoryInterface;
use App\Repository\Product\GalleryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Setting\SettingRepositoryInterface;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Frontend\Product\ProductDetailRepository;
use App\Repository\Frontend\Product\ProductDetailRepositoryInterface;



class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->bind(GalleryRepositoryInterface::class,GalleryRepository::class);
        $this->app->bind(MadeInRepositoryInterface::class,MadeInRepository::class);
        $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);
        $this->app->bind(SettingRepositoryInterface::class,SettingRepository::class);
        $this->app->bind(SizeRepositoryInterface::class,SizeRepository::class);
        $this->app->bind(ProductDetailRepositoryInterface::class,ProductDetailRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

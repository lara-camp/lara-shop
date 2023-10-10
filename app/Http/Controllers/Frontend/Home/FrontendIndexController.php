<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utility;
use Illuminate\Support\Facades\DB;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\MadeIn\MadeInRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;

class FrontendIndexController extends Controller
{
    private $categoryRepo;
    private $madeRepo;
    private $productRepo;
    public function  __construct(
        CategoryRepositoryInterface $categoryRepo,
        MadeInRepositoryInterface $madeRepo,
        ProductRepositoryInterface $productRepo
    ){
        DB::connection()->enableQueryLog();
        $this->categoryRepo = $categoryRepo;
        $this->madeRepo     = $madeRepo;
        $this->productRepo  = $productRepo;

    }
    public function frontendIndex() {
        try{
            $products = $this->productRepo->getProductRandom();
            $logs = "Home Screen::";
            Utility::saveDebugLog($logs);
            return view('frontend.layouts.partial.index',compact([
                'products'
            ]));
        }catch(\Exception $e){
            $logs = "Product Lists Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function category() {
        return view('frontend.layouts.partial.category');
    }
    public function blog() {
        return view('frontend.layouts.partial.blog');
    }
    public function tracking() {
        return view('frontend.layouts.partial.tracking');
    }
    public function contact() {
        return view('frontend.layouts.partial.contact');
    }

}

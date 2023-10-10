<?php

namespace App\Http\Controllers\Frontend\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\Frontend\Product\ProductDetailRepositoryInterface;

class ProductDetailController extends Controller
{
    private $productRepo;
    public function __construct(ProductDetailRepositoryInterface $productRepo) {
        DB::connection()->enableQueryLog();
        $this->productRepo = $productRepo;
    }
    public function index($id){
        $product = $this->productRepo->showDetail((int) $id);
        return view('frontend.Product.detail',compact([
            'product'
        ]));
    }
}

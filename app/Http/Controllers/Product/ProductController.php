<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function form(){
        // try{
            return view('backend.product.form');
        // }catch(\Exception $e){
        //     abort(500);
        // }
    }
}

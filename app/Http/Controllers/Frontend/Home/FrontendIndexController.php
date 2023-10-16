<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Utility;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Login\UserRegisterRequest;
use App\Repository\MadeIn\MadeInRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Category\CategoryRepositoryInterface;

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
    public function checkUser(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            return 'true';
        } else {
            return 'false';
        }
    }
    public function registerForm()
    {
        return view('frontend.auth.login');
    }

    public function register(UserRegisterRequest $request)
    {
        
        $customer = Customer::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'address'   => $request->address,
            'password'  => Hash::make($request->password),
        ]);
        Auth::guard('customer')->login($customer);

        // Check if the customer is authenticated
        if (Auth::guard('customer')->check()) {
        return 'Customer has been registered and authenticated.';
        } else {
        return 'Customer registration failed.';
        }
    }

}

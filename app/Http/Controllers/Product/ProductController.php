<?php

namespace App\Http\Controllers\Product;
use App\Utility;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\MadeIn\MadeInRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;


class ProductController extends Controller
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
    public function form(){
        // try{
            $categories = $this->categoryRepo->store();
            $mades      = $this->madeRepo->store();
            $logs = "Product Create Form Screen::";
            Utility::saveDebugLog($logs);
            return view('backend.product.form',compact([
                'categories',
                'mades'
            ]));
        // }catch(\Exception $e){
        //     $logs = "Product Create Form Error Screen::";
        //     Utility::saveErrorLog($logs);
        //     abort(500);
        // }
    }
    public function index(){
        try{
            $products = $this->productRepo->get();
            $logs = "Product Lists Screen::";
            Utility::saveDebugLog($logs);
            return view('backend.product.index',compact([
                'products'
            ]));
        }catch(\Exception $e){
            $logs = "Product Lists Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function store(ProductStoreRequest $request){
        try{
            $result = $this->productRepo->create((array) $request->all());
            $logs = "Product Create Screen::";
            Utility::saveDebugLog($logs);
            if($result['SERVER_MESSAGE'] == ReturnMessage::OK){
                $insertRoomID = $result['InsertRoomID'];
                return redirect('admin-backend/product/gallery/'.$insertRoomID)->with('successMsg', 'Product Create Is Succeed');
            }else{
                return back()->with('errorMsg', 'Product Create Is Fail');
            }
        }catch(\Exception $e){
            $logs = "Product Create Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function edit($id){
        try{
            $product    = $this->productRepo->edit((int) $id);
            $categories   = $this->categoryRepo->store();
            $mades      = $this->madeRepo->store();
            $logs = "Product Edit Screen::";
            Utility::saveDebugLog($logs);
            return view('backend.product.form',compact([
                'product',
                'categories',
                'mades'
             ]));
        }catch(\Exception $e){
            $logs = "Product Edit Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function update(ProductUpdateRequest $request){
        try{
            $result = $this->productRepo->update((array)$request->all());
            $logs = "Product Update Screen::";
            Utility::saveDebugLog($logs);
            if($result['SERVER_MESSAGE'] == ReturnMessage::OK){
                return redirect()->route('productLists')->with('successMsg', 'Product  Update Is Succeed');
            }else{
                return back()->with('errorMsg', 'Product  Update Is Fail')->withInput();
            }
        }catch(\Exception $e){
            $logs = "Product Update Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function delete($id){
        try{
            $result    = $this->productRepo->delete((int) $id);
            $logs = "Product Delete Screen::";
            Utility::saveDebugLog($logs);
            if($result['SERVER_MESSAGE'] == ReturnMessage::OK){
                return back()->with('successMsg', 'Product  Delete Is Succeed');
            }else{
                return back()->with('errorMsg', 'Product  Delete Is Fail')->withInput();
            }
        }catch(\Exception $e){
            $logs = "Product Delete Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}

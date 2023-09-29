<?php

namespace App\Http\Controllers\Product;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\Product\GalleryRepositoryInterface;
use App\Http\Requests\Product\ProductGalleryStoreRequest;
use App\Http\Requests\Product\ProductGalleryUpdateRequest;

class GalleryController extends Controller
{

    private $galleryRepo;
    public function  __construct(
        GalleryRepositoryInterface $galleryRepo,
    ){
        DB::connection()->enableQueryLog();
        $this->galleryRepo = $galleryRepo;

    }
    public function galleryCreate($id){
        try{
            $gallery = $this->galleryRepo->getProductGalleryById((int)$id);
            return view('backend.product.productGallery',compact([
                'gallery',
                'id'
            ]));
        }catch(\Exception $e){
            $logs = "Product Gallery Create Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function galleryStore(ProductGalleryStoreRequest $request){
        try{
            $result = $this->galleryRepo->storeProductGallery((array) $request->all());
            $logs = "Product Gallery Create Screen::";
            Utility::saveDebugLog($logs);
            if($result['SERVER_MESSAGE'] == ReturnMessage::OK){
                return back()->with('successMsg', 'Product Gallery Create Is Succeed');
            }else{
                return back()->with('errorMsg', 'Product Gallery Create Is Fail');
            }
        }catch(\Exception $e){
            $logs = "Product Gallery Create Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function galleryEdit($id){
        try{
            $galleryEdit =  $this->galleryRepo->getProductGallery((int) $id);
            $logs = "Product Gallery Edit Screen:: ";
            Utility::saveDebugLog($logs);
            return view('backend.product.productGallery',compact([
                'galleryEdit',
            ]));
        }catch(\Exception $e){
            $logs = "Product Gallery Edit Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function galleryUpdate(ProductGalleryUpdateRequest $request){
        try{
            if($request->file == null){
                return redirect()->route('galleryCreate',$request->product_id)->with('successMsg', 'Product Gallery Update Is Succeed');
            }else{
                $result = $this->galleryRepo->updateProductGallery((array) $request->all());
                $logs = "Product Gallery Update Screen:: ";
                Utility::saveDebugLog($logs);
                if($result['SERVER_MESSAGE'] == ReturnMessage::OK){
                    return redirect()->route('galleryCreate',$request->product_id)->with('successMsg', 'Product Gallery Update Is Succeed');
                }else{
                    return redirect()->route('galleryCreate',$request->product_id)->with('errorMsg', 'Product Gallery Update Is Fail');
                }
            }
        }catch(\Exception $e){
            $logs = "Product Gallery Update Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function galleryDelete($id){
        try{
            $result = $this->galleryRepo->deleteProductGallery((int) $id);
            $logs = "Product Gallery Delete Screen:: ";
            Utility::saveDebugLog($logs);
            if($result['SERVER_MESSAGE'] == ReturnMessage::OK){
                return back()->with('deleteMsg', 'Product Gallery is deleted');
            }else{
                return back()->with('errorMsg', 'Product Gallery delete Is Fail');
            }
        }catch(\Exception $e){
            $logs = "Product Gallery Delete Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}

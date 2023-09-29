<?php

namespace App\Repository\Product;
use App\Utility;
use App\Constant;
use App\ReturnMessage;
use App\Models\Gallery;
use App\Repository\Product\GalleryRepositoryInterface;

class GalleryRepository implements GalleryRepositoryInterface {
    public function getProductGallery(int $id){
        $gallery  = Gallery::Find($id);
        return $gallery;
    }
    public function getProductGalleryById(int $productId){
        $gallery  = Gallery::Select('id','image','product_id')
                    ->where('product_id','=',$productId)
                    ->wherenull('deleted_at')
                    ->orderBy('id', 'desc')
                    ->get();
                    return $gallery;
    }
    public function storeProductGallery(array $data){
        $returnedObj = [];
        $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $uniqueName            = Utility::getImageExtension($data['file']);
            $paraObj               = new Gallery();
            $paraObj->image       = $uniqueName;
            $paraObj->product_id   = $data['product_id'];
            $tmpObj                = Utility::addCreated($paraObj);
            $tmpObj->save();
            $destination =  public_path('assets/upload/'.$data['product_id'].'/');
            Utility::cropResize($data['file'],Constant::Gallery_Width,Constant::Gallery_Height,$destination,$uniqueName);
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::OK;
            return $returnedObj;

        }catch(\Exception $e) {
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnedObj;
        }
    }
    public function updateProductGallery (array $data){
        $returnedObj = [];
        $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $uniqueName         = Utility::getImageExtension($data['file']);
            $paraObj            = Gallery::find($data['id']);
            $oldImage           = $paraObj->image;
            $paraObj->image     = $uniqueName;
            $tmpObj             = Utility::addUpdated($paraObj);
            $tmpObj->save();
            $destination =  public_path('assets/upload/'.$data['product_id'].'/');
            Utility::cropResize($data['file'],Constant::Gallery_Width,Constant::Gallery_Height,$destination,$uniqueName);
            $oldImagePath =  public_path('assets/upload/'.$data['product_id'].'/'.$oldImage);
            unlink($oldImagePath);
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::OK;
            return $returnedObj;
        }catch(\Exception $e) {
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnedObj;
        }
    }
    public function deleteProductGallery(int $id){
        $returnedObj = [];
        $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $paraObj    = Gallery::find($id);
            $oldImage           = $paraObj->image;
            $oldImagePath =  public_path('assets/upload/'.$paraObj->product_id.'/'.$oldImage);
            $tmpObj     = Utility::addDeleted($paraObj);
            $tmpObj->save();
            unlink($oldImagePath);
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::OK;
            return $returnedObj;
        }catch(\Exception $e) {
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnedObj;
        }
    }
}
?>

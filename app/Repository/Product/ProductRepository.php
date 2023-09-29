<?php

namespace App\Repository\Product;
use App\Utility;
use App\Constant;
use App\ReturnMessage;
use App\Models\Product;
use App\Repository\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {

    public function create(array $data) {
        $returnedObj = [];
        $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $paraObj                    = new Product();
            $paraObj->name              = $data['name'];
            $paraObj->price             = $data['price'];
            $paraObj->stock             = $data['stock'];
            $paraObj->made              = $data['made'];
            $paraObj->description       = $data['description'];
            $paraObj->category_id       = $data['category_id'];
            $uniqueName                 = Utility::getImageExtension($data['file']);
            $paraObj->thumbnail         = $uniqueName;
            if(array_key_exists("id", $data)){
                $id = $data['id'];
                $paraObj->logo_path         = 'assets/upload/'.$id.'/thumb/';
            }
            $tmpObj                     = Utility::addCreated($paraObj);
            $tmpObj->save();
            $destination =  public_path('assets/upload/'.$tmpObj->id.'/thumb/');
            if(!file_exists($destination)){
                mkdir($destination, 0777, true);
            }
            Utility::cropResize($data['file'],Constant::Thumb_Width,Constant::Thumb_Height,$destination,$uniqueName);
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::OK;
            $returnedObj['InsertRoomID']  = $tmpObj->id;
            return $returnedObj;
        }catch(\Exception $e) {
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnedObj;
        }
    }
    public function get(){
        $productDatas  = Product::Select(
            'id',
            'name',
            'price',
            'stock',
            'made',
            'description',
            'thumbnail',
            'category_id'
            )
                    ->wherenull('deleted_at')
                    ->orderBy('id', 'desc')
                    ->get();
        return $productDatas;
    }
    public function edit(int $id){
        $productData      = Product::find($id);
        return $productData;
    }
    public function update(array $data){
        $returnedObj = [];
        $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $id                         = $data['id'];
            $paraObj                    = Product::find($id);
            $oldImage                   = $paraObj->thumbnail;
            $paraObj->name              = $data['name'];
            $paraObj->price             = $data['price'];
            $paraObj->stock             = $data['stock'];
            $paraObj->made              = $data['made'];
            $paraObj->description       = $data['description'];
            $paraObj->category_id       = $data['category_id'];
            if(array_key_exists("file", $data)){
                $uniqueName                 = Utility::getImageExtension($data['file']);
                $paraObj->thumbnail         = $uniqueName;
                $oldImagePath =  public_path('assets/upload/'.$id.'/thumb/'.$oldImage);
                unlink($oldImagePath);
            }
            $tmpObj             = Utility::addUpdated($paraObj);
            $tmpObj->save();
            $destination  =  public_path('assets/upload/'. $id.'/thumb/');
            if(array_key_exists("file", $data)){
                if(!file_exists($destination)){
                    mkdir($destination, 0777, true);
                }
                Utility::cropResize($data['file'],Constant::Thumb_Width,Constant::Thumb_Height,$destination,$uniqueName);
            }
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::OK;
            return $returnedObj;
        }catch(\Exception $e) {
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnedObj;
        }
    }
    public function delete(int $id){
        $returnedObj = [];
        $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $paraObj    = Product::find($id);
            $tmpObj     = Utility::addDeleted($paraObj);
            $tmpObj->save();
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::OK;
            return $returnedObj;
        }catch(\Exception $e) {
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnedObj;
        }
    }
}

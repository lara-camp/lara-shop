<?php

namespace App\Repository\Frontend\Product;

use App\Models\Product;
use App\Repository\Frontend\Product\ProductDetailRepositoryInterface;

class ProductDetailRepository implements ProductDetailRepositoryInterface {

    public function showDetail(int $productId){
        $product = Product::find($productId);
        return $product;
    }

    // public function store() {
    //     $made       = Made::select('id','name')
    //                     ->wherenull('deleted_at')
    //                     ->get();
    //     return $made;
    // }

    // public function edit(int $id) {
    //     $made       = Made::find($id);
    //     return $made;
    // }

    // public function update(array $updateData) {
    //     $returnMessage  = array();
    //     $returnMessage['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
    //     try {
    //         $id            = $updateData['id'];
    //         $made          = Made::find($id);
    //         $made->name    = $updateData['name'];
    //         $returnObj     = Utility::addUpdated($made);
    //         $returnObj->save();
    //         $returnMessage['SERVER_MESSAGE'] = ReturnMessage::OK;
    //         return $returnMessage;
    //     } catch (Exception $e) {
    //         $returnMessage['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
    //         return $returnMessage;
    //     }
    // }

    // public function delete(int $id) {
    //     $returnMessage  = array();
    //     $returnMessage['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
    //     try {
    //         $made          = Made::find($id);
    //         $returnObj         = Utility::addDeleted($made);
    //         $returnObj->save();
    //         $returnMessage['SERVER_MESSAGE'] = ReturnMessage::OK;
    //         return $returnMessage;
    //     } catch (Exception $e) {
    //         $returnMessage['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
    //         return $returnMessage;
    //     }
    // }
}

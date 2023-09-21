<?php

namespace App\Repository\Category;

use Exception;
use App\Utility;
use App\ReturnMessage;
use App\Models\Category;
use App\Repository\Category\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {

    public function create($data) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $category       = new Category();
            $category->name = $data['name'];
            $returnObj      = Utility::addCreated($category);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        }catch(Exception $e){
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }

    }
}

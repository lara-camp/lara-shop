<?php

namespace App\Repository\MadeIn;

use Exception;
use App\Utility;
use App\Models\Made;
use App\ReturnMessage;
use App\Models\Category;
use App\Repository\MadeIn\MadeInRepositoryInterface;

class MadeInRepository implements MadeInRepositoryInterface {

    public function create(array $data) {
        $returnMessage  = array();
        $returnMessage['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $made       = new Made();
            $made->name = $data['name'];
            $returnObj      = Utility::addCreated($made);
            $returnObj->save();
            $returnMessage['SERVER_MESSAGE'] = ReturnMessage::OK;
            return $returnMessage;
        }catch(Exception $e){
            $returnMessage['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function store() {
        $made       = Made::select('id','name')
                        ->wherenull('deleted_at')
                        ->get();
        return $made;
    }

    public function edit(int $id) {
        $made       = Made::find($id);
        return $made;
    }

    public function update(array $updateData) {
        $returnMessage  = array();
        $returnMessage['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $id            = $updateData['id'];
            $made          = Made::find($id);
            $made->name    = $updateData['name'];
            $returnObj     = Utility::addUpdated($made);
            $returnObj->save();
            $returnMessage['SERVER_MESSAGE'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (Exception $e) {
            $returnMessage['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function delete(int $id) {
        $returnMessage  = array();
        $returnMessage['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $made          = Made::find($id);
            $returnObj         = Utility::addDeleted($made);
            $returnObj->save();
            $returnMessage['SERVER_MESSAGE'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (Exception $e) {
            $returnMessage['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }
}

<?php

namespace App\Repository\Size;

use App\Utility;
use App\Models\Size;
use App\ReturnMessage;
use App\Repository\Size\SizerepositoryInterface;

class SizeRepository implements SizeRepositoryInterface {
    public function get(){
        $size  = Size::Select('id','name')
                    ->wherenull('deleted_at')
                    ->orderBy('id', 'asc')
                    ->get();
        return $size;
    }
    public function store($data){
            $returnedObj = [];
            $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            try{
                $paraObj        = new Size();
                $paraObj->name  = $data['name'];
                $tmpObj         = Utility::addCreated($paraObj);
                $paraObj->save();
                $returnedObj['SERVER_MESSAGE'] = ReturnMessage::OK;
                return $returnedObj;
            } catch(\Exception $e) {
                $returnObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
                return $returnObj;
            }
        }
    public function edit($id){
        $result   = Size::find($id);
        return $result;
    }
    public function Update($data){
        $returnedObj = [];
        $returnedObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $id         = $data['id'];
            $name       = $data['name'];
            $paraObj    = Size::find($id);
            if ($paraObj) {
                $paraObj->name  = $name;
                $tmpObj         = Utility::addUpdated($paraObj);
                $tmpObj->save();
                $returnedObj['SERVER_MESSAGE'] = ReturnMessage::OK;
            }
            return $returnedObj;
        } catch(\Exception $e) {
            $returnObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }
}

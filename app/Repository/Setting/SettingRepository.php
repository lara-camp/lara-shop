<?php

namespace App\Repository\Setting;
use App\Utility;
use App\Constant;
use Carbon\Carbon;
use App\ReturnMessage;
use App\Models\Setting;
use Intervention\Image\Facades\Image;
use App\Repository\Setting\SettingRepositoryInterface;

class SettingRepository implements SettingRepositoryInterface {
    public function update(array $data){
        $returnObj = array();
        $returnObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        // try{
            $paramObj                   = Setting::find($data['id']);
            $image                      = $paramObj->logo_path;
            $paramObj->name             = $data['name'];
            $paramObj->email            = $data['email'];
            $paramObj->address          = $data['address'];
            $paramObj->online_phone     = $data['online_phone'];
            $paramObj->outline_phone     = $data['outline_phone'];
            $paramObj->size_unit        = $data['size_unit'];
            $paramObj->price_unit       = $data['price_unit'];
            $tmpObj = Utility::addUpdated($paramObj);
            $tmpObj->save();
            if (array_key_exists('file', $data)) {
                $uniqueName = Utility::getImageExtension($data['file']);
                $paramObj->logo_path    = $uniqueName;
                $destination = public_path('assets/images');
                Utility::cropResize($image,Constant::Setting_Image_Width,Constant::Setting_Image_Height,$destination,$uniqueName);
            }
            $returnObj['SERVER_MESSAGE'] = ReturnMessage::OK;
            return $returnObj;
        // } catch(\Exception $e) {
        //     dd($e->getMessage());
        //     $returnObj['SERVER_MESSAGE'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        //     return $returnObj;
        // }

    }
}

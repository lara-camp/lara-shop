<?php

namespace App;

use App\Constant;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class Utility {
    public static function addCreated($paraObj) {

        $today_date             = date('Y-m-d H:i:s');
        $paraObj->created_at    = $today_date;
        $paraObj->updated_at    = $today_date;

        if(Auth::guard('Admin')->check()) {
            $user_id                = Auth::guard('Admin')->user()->id;
            $paraObj->created_by    = $user_id;
            $paraObj->updated_by    = $user_id;
        }
        return $paraObj;
    }

    public static function addUpdated($paraObj) {
        $today_date             = date('Y-m-d H:i:s');
        $paraObj->updated_at    = $today_date;

        if(Auth::guard('Admin')->check()) {
            $user_id                = Auth::guard('Admin')->user()->id;
            $paraObj->updated_by    = $user_id;
        }
        return $paraObj;
    }

    public static function addDeleted($paraObj) {
        $today_date             = date('Y-m-d H:i:s');
        $paraObj->deleted_at    = $today_date;
        if(Auth::guard('Admin')->check()) {
            $user_id                = Auth::guard('Admin')->user()->id;
            $paraObj->deleted_by    = $user_id;
        }
        return $paraObj;
    }

    public static function saveDebugLog($logMessage) {
        $log = DB::getQueryLog();
        $formattedLog = '';

        foreach ($log as $entry) {
            $query = $entry['query'];
            $bindings = $entry['bindings'];
            foreach ($bindings as $binding) {
                $query = preg_replace('/\?/', "'$binding'", $query, 1);
            }
            $formattedLog .= $query . PHP_EOL;
        }
        Log::debug(" $logMessage" . PHP_EOL . $formattedLog);
    }
    public static function saveErrorLog($logMessage) {
        $log = DB::getQueryLog();
        $formattedLog = '';

        foreach ($log as $entry) {
            $query = $entry['query'];
            $bindings = $entry['bindings'];
            foreach ($bindings as $binding) {
                $query = preg_replace('/\?/', "'$binding'", $query, 1);
            }

            $formattedLog .= $query . PHP_EOL;
        }
            Log::error(" $logMessage" . PHP_EOL . $formattedLog);
    }
    public static function cropResize($file,$width,$height,$destination,$filename){

        if(!file_exists($destination)){
            mkdir($destination, 0777, true);
        }
        $watermarkPath  = public_path(Constant::Water_Mark_Path);
        $image          = Image::make($file);
        $modifiedImage  = $image->crop($width, $height);
        $modifiedImage->encode();
        $watermark  = Image::make($watermarkPath);
        $watermarkX = $modifiedImage->width() - $watermark->width() - 10;
        $watermarkY = $modifiedImage->height() - $watermark->height() - 10;
        $modifiedImage->insert($watermark, 'bottom-right', $watermarkX, $watermarkY);
        $modifiedImage->save($destination .$filename);
    }
    public static function getImageExtension($file){
        $image       = $file;
        $extension   = $image->getClientOriginalExtension();
        $uniqueName  = date('Ymd_His')."_".uniqid().".".$extension;
        return $uniqueName;
    }
};

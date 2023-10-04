<?php

namespace App\Http\Controllers\MadeIn;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Made\MadeStoreRequest;
use App\Http\Requests\Made\MadeUpdateRequest;
use App\Repository\MadeIn\MadeInRepositoryInterface;

class MadeInController extends Controller
{
    private $madeInepository;
    public function __construct(MadeInRepositoryInterface $madeInepository) {
        DB::connection()->enableQueryLog();
        $this->madeInepository = $madeInepository;
    }
    public function madeInForm() {
        return view('backend.made.form');
    }
    public function madeCreate(MadeStoreRequest $request) {
        try{
            $result     = $this->madeInepository->create((array) $request->all());
            $logs = "Made Create Error Screen::";
            Utility::saveDebugLog($logs);
            if($result["SERVER_MESSAGE"] == ReturnMessage::OK) {
                return redirect()->route('madeList')->with('successMsg','made create success.');
            }else{
                return redirect()->route('madeList')->with('errorMsg','made create fail.');
            }
        }catch(\Exception $e){
            $logs = "Made Create Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function madeList() {
        try{
            $madeStore     = $this->madeInepository->store();
            $logs = "Made List Screen::";
            Utility::saveDebugLog($logs);
            return view('backend/made/list',compact([
                'madeStore'
            ]));
        }catch(\Exception $e){
            $logs = "Made List Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function madeEdit($id) {
        try{
            $made     = $this->madeInepository->edit((int) $id);
            $logs = "Made Edit Screen::";
            Utility::saveDebugLog($logs);
            return view('backend/made/form',compact([
                'made'
            ]));
        }catch(\Exception $e){
            $logs = "Made Edit Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function madeUpdate(MadeUpdateRequest $request) {
        try{
            $result     = $this->madeInepository->update((array) $request->all());
            $logs = "Made Update Screen::";
            Utility::saveDebugLog($logs);
            if($result["SERVER_MESSAGE"] == ReturnMessage::OK) {
                return redirect()->route('madeList')->with('successMsg','made update success.');
            }else{
                return redirect()->route('madeList')->with('errorMsg','made update fail.');
            }
        }catch(\Exception $e){
            $logs = "Made Update Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function madeDelete($id) {
        try{
            $result     = $this->madeInepository->delete((int) $id);
            $logs = "Made Delete Screen::";
            Utility::saveDebugLog($logs);
            if($result["SERVER_MESSAGE"] == ReturnMessage::OK) {
                return redirect()->route('madeList')->with('successMsg','made delete success.');
            }else{
                return redirect()->route('madeList')->with('errorMsg','made delete fail.');
            }
        }catch(\Exception $e){
            $logs = "Made Delete Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}

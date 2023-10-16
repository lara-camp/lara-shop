<?php

namespace App\Http\Controllers\Size;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Size\SizeStoreRequest;
use App\Http\Requests\Size\SizeUpdateRequest;
use App\Repository\Size\SizeRepositoryInterface;

class SizeController extends Controller
{
    private $sizerepo;
    public function  __construct(SizeRepositoryInterface $sizerepo){
        DB::connection()->enableQueryLog();
        $this->sizerepo = $sizerepo;
    }
    public function form(){
        return view('backend.size.form');
    }
    public function index(){
        try{
            $sizes  = $this->sizerepo->get();
            $logs = "Size List Screen::";
            Utility::saveDebugLog($logs);
            return view('backend.size.index',compact(['sizes']));
        }catch(\Exception $e){
            $logs = "Size List Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function store(SizeStoreRequest $request){
        try{
            $result  = $this->sizerepo->store( $request->all());
            $logs = "Size Create Screen::";
            Utility::saveDebugLog($logs);
            if($result['SERVER_MESSAGE'] == ReturnMessage::OK){
                return redirect()->route('sizeIndex')->with('successMsg', 'Size Create Is Succeed');
            }else{
                return redirect()->route('sizeIndex')->with('errorMsg', 'Size Create Is Fail');
            }
        }catch(\Exception $e){
            $logs = "Size Create Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public  function edit($id){
        try{
            $updateSize   =  $this->sizerepo->edit($id);
            $logs = "Size Edit Screen::";
            Utility::saveDebugLog($logs);
            return view('backend.size.form',compact(['updateSize']));
        }catch(\Exception $e){
            $logs = "Size Edit Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function update(SizeUpdateRequest $request){
        try{
            $data       =$request->all();
            $result  = $this->sizerepo->update( $data);
            $logs = "Size Update Screen::";
            Utility::saveDebugLog($logs);
            if($result['SERVER_MESSAGE'] == ReturnMessage::OK){
                return redirect()->route('sizeIndex')->with('successMsg', 'Size Create Is Succeed');
            }else{
                return redirect()->route('sizeIndex')->with('errorMsg', 'Size Create Is Fail');
            }
        }catch(\Exception $e){
            $logs = "Size Update Error Screen::";
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}

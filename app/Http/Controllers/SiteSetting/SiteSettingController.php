<?php

namespace App\Http\Controllers\SiteSetting;

use App\Utility;
use App\ReturnMessage;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\SettingUpdateRequest;
use App\Repository\Setting\SettingRepositoryInterface;

class SiteSettingController extends Controller
{
    private $settingRepository;
    public function __construct(
        SettingRepositoryInterface $settingRepository,
    ) {
        DB::connection()->enableQueryLog();
        $this->settingRepository    = $settingRepository;
    }
    public function index()
    {
        $setting =  Setting::find(1);
        return view('backend.sitesetting.form', compact('setting'));
    }

    public function update(SettingUpdateRequest $request){
        // try {
            $settingUpdate  = $this->settingRepository->update((array) $request->all());
            Utility::saveDebugLog("Setting Update::");
            if($settingUpdate['SERVER_MESSAGE'] == ReturnMessage::OK){
                return back()->with(['success_msg' => 'Setting Create Successfully...']);
            }else{
                return back()->with(['error_msg' => ' Setting Create Fail!']);
            }
        // } catch (\Exception $e) {
        //     Utility::saveErrorLog($e->getMessage());
        //     abort(500);
        // }
    }
}

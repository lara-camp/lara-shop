<?php
    use App\Models\Setting;
    if(!function_exists('getSiteSetting')) {
        function getSiteSetting() {
            $site_setting = Setting::first();
            return $site_setting;
        }
    }
?>

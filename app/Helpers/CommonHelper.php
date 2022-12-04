<?php


use App\Models\Gateway;
use App\Models\MerchantPayment;
use App\Models\Setting;
use Stevebauman\Location\Facades\Location;

if (!function_exists('avatar')) {
    function avatar($url)
    {
        return asset($url ? 'img/' . $url : "assets/images/avatar/avatar-1.png");
    }
}

if (!function_exists('is_active')) {
    function is_active($route)
    {
        if (is_array($route)) {
            foreach ($route as $value) {
                if (Request::routeIs($value)) return 'active';
            }
        }
        if (Request::routeIs($route)) return 'active';
    }
}

if (!function_exists('checkbox_filter')) {
    function checkbox_filter($value)
    {
        return $value == 'on' ? 1 : 0;
    }
}

if (!function_exists('setting_get')) {
    function setting_get($key)
    {
        $value = Setting::where('key', $key)->first()->value;
        $object = json_decode($value);

        if (json_last_error() === JSON_ERROR_NONE) {
            return $object;
        }
        return $value;
    }
}
if (!function_exists('location_get')) {
    function location_get()
    {
        /* $ip = $request->ip(); Dynamic IP address */
        $ip = '103.77.190.201'; /* Static IP address */
        return Location::get($ip);
    }
}

if (!function_exists('status_class')) {
    function status_class($status)
    {
        $statusClass = [
            'pending' => 'ti-flag-alt cl-yellow',
            'success' => 'ti-check cl-primary',
            'fail' => 'ti-close cl-red',
        ];
        return $statusClass[$status];
    }
}
if (!function_exists('gateway_info')) {
    function gateway_info($code)
    {
        $info = Gateway::where('gateway_code', $code)->first();
        return json_decode($info->credentials);
    }
}

if (!function_exists('timing_message')) {

    function timing_message()
    {
        $greetings = "";

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");

        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");


        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greetings = "Good Morning!";
        } else

            /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
            if ($time >= "12" && $time < "17") {
                $greetings = "Good Afternoon!";
            } else

                /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
                if ($time >= "17" && $time < "19") {
                    $greetings = "Good Evening!";
                } else

                    /* Finally, show good night if the time is greater than or equal to 1900 hours */
                    if ($time >= "19") {
                        $greetings = "Good Night!";
                    }

        return $greetings;
    }
}

if (!function_exists('amount_status')){
    function amount_status($type)
    {
        $amountClass = [
            'deposit' => 'cl-primary',
            'manual_deposit' => 'cl-primary',
            'send_money' => 'cl-red',
            'referral' => 'cl-primary',
            'withdraw' => 'cl-red',
            'receive_money' => 'cl-primary',
            'payment' => 'cl-primary',
            'make_payment' => 'cl-red',
        ];
        return $amountClass[$type];
    }
}

if (!function_exists('underscoreToCamelCase')){
    function underscoreToCamelCase($string, $capitalizeFirstCharacter = true)
    {
        $str = str_replace(' ', ' ', ucwords(str_replace('_', ' ', $string)));
        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }
        return $str;
    }
}

if (!function_exists('unique_str')){
    function unique_str() {
        $uniqueStr = Str::random(100);
        while(MerchantPayment::where('payment_id', $uniqueStr)->exists()) {
            $uniqueStr = Str::random(100);
        }
        return $uniqueStr;
    }
}

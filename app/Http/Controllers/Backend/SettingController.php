<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Gateway;
use App\Models\Setting;
use App\Models\Wallet;
use Flash;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings()
    {
        return view('backend.settings.index');
    }

    public function generalSetting()
    {
        return view('backend.settings.general');
    }


    public function gdrp()
    {
        return view('backend.settings.gdrp');
    }


    public function generalSettingStore(Request $request)
    {

        $this->settingUpdate('site_title', $request->site_title);
        $this->settingUpdate('site_copyright', $request->site_copyright);
        $this->settingUpdate('email_verification',$request->email_verification ?? 0);


        if (isset($request->logo)) {
            $logo = FileHelper::uploadImage($request, 'logo', setting_get('logo'), [], '280', '70');
            $this->settingUpdate('logo', $logo);
        }

        if (isset($request->favicon)) {
            $favicon = FileHelper::uploadImage($request, 'favicon', setting_get('favicon'));
            $this->settingUpdate('favicon', $favicon);
        }

        Flash::success('Setting saved successfully.');
        return redirect()->back();
    }

    private function settingUpdate($key, $value)
    {
        Setting::where('key', $key)->update(['value' => $value]);
    }

    public function socialLink()
    {
        return view('backend.settings.social_link');
    }

    public function socialLinkStore(Request $request)
    {
        $this->settingUpdate('facebook_link', $request->facebook_link);
        $this->settingUpdate('instagram_link', $request->instagram_link);
        $this->settingUpdate('twitter_link', $request->twitter_link);
        $this->settingUpdate('pinterest_link', $request->pinterest_link);

        Flash::success('Social Link saved successfully.');
        return redirect()->back();
    }

    public function gdrpStore(Request $request)
    {
        $gdprCookie = [
            'status' => $request->status ?? 0,
            'description' => $request->description,
            'url' => $request->url,
            'url_level' => $request->url_level,
        ];


        $this->settingUpdate('gdpr_cookie', json_encode($gdprCookie));

        Flash::success('GDPR Cookie saved successfully.');
        return redirect()->back();

    }

    public function tawk()
    {
        return view('backend.settings.tawk');
    }

    public function tawkStore(Request $request)
    {

        $tawkCookie = [
            'status' => checkbox_filter($request->status),
            'description' => $request->description
        ];

        $this->settingUpdate('tawk_chat', json_encode($tawkCookie));
        Flash::success('Tawk Chat saved successfully.');
        return redirect()->back();
    }

    public function googleRecaptcha()
    {
        return view('backend.settings.google_recaptcha');
    }

    public function googleRecaptchaStore(Request $request)
    {

        $googleRecaptcha = [
            'status' => checkbox_filter($request->status),
            'description' => $request->description
        ];

        $this->settingUpdate('google_recaptcha', json_encode($googleRecaptcha));
        Flash::success('Google recaptcha saved successfully.');
        return redirect()->back();
    }

    public function googleAnalytics()
    {
        return view('backend.settings.google_analytics');
    }

    public function googleAnalyticsStore(Request $request)
    {

        $googleAnalytics = [
            'status' => checkbox_filter($request->status),
            'description' => $request->description
        ];

        $this->settingUpdate('google_analytics', json_encode($googleAnalytics));
        Flash::success('Google Analytics saved successfully.');
        return redirect()->back();
    }

    public function facebookAnalytics()
    {
        return view('backend.settings.facebook_analytics');
    }

    public function facebookAnalyticsStore(Request $request)
    {

        $facebookAnalytics = [
            'status' => checkbox_filter($request->status),
            'description' => $request->description
        ];

        $this->settingUpdate('facebook_analytics', json_encode($facebookAnalytics));
        Flash::success('Facebook Analytics saved successfully.');
        return redirect()->back();
    }

    public function homePage()
    {
        return view('backend.settings.home_page');
    }

    public function homePageStore(Request $request)
    {
        $this->settingUpdate('home_page', $request->value);
        Flash::success('Home Page Setting saved successfully.');
        return redirect()->back();
    }


    // ========= paypal ============

    public function getaway()
    {
        return view('backend.settings.getaway.index');
    }

    public function paypal()
    {
        $paypal = Gateway::where('gateway_code', 'paypal')->first();

        return view('backend.settings.getaway.paypal', compact('paypal'));
    }


    // ========= stripe ============

    public function paypalStore(Request $request)
    {

        $Credentials = [
            'mode' => $request->mode == 'on' ? 'live' : 'sandbox',
            'app_id' => $request->app_id,
            'client_id' => $request->client_id,
            'client_secret' => $request->client_secret,
        ];

        Gateway::where('gateway_code', 'paypal')->first()->update(
            [
                'credentials' => json_encode($Credentials),
                'status' => $request->status == 'on' ? 1 : 0,
            ]
        );

        Flash::success('Paypal Setting saved successfully.');
        return redirect()->back();
    }

    public function stripe()
    {
        $stripe = Gateway::where('gateway_code', 'stripe')->first();

        return view('backend.settings.getaway.stripe', compact('stripe'));
    }


    // ========= mollie ============

    public function stripeStore(Request $request)
    {

        $Credentials = [
            'stripe_key' => $request->stripe_key,
            'stripe_secret' => $request->stripe_secret,
        ];

        Gateway::where('gateway_code', 'stripe')->first()->update(
            [
                'credentials' => json_encode($Credentials),
                'status' => $request->status == 'on' ? 1 : 0,
            ]
        );

        Flash::success('Stripe Setting saved successfully.');
        return redirect()->back();
    }

    public function mollie()
    {
        $mollie = Gateway::where('gateway_code', 'mollie')->first();

        return view('backend.settings.getaway.mollie', compact('mollie'));
    }


    // ========= perfectmoney ============

    public function mollieStore(Request $request)
    {

        $Credentials = [
            'api_key' => $request->api_key,
        ];

        Gateway::where('gateway_code', 'mollie')->first()->update(
            [
                'credentials' => json_encode($Credentials),
                'status' => $request->status == 'on' ? 1 : 0,
            ]
        );

        Flash::success('Mollie Setting saved successfully.');
        return redirect()->back();
    }

    public function perfectmoney()
    {
        $perfectmoney = Gateway::where('gateway_code', 'perfectmoney')->first();

        return view('backend.settings.getaway.perfectmoney', compact('perfectmoney'));
    }


    // ========= coinbase ============

    public function perfectmoneyStore(Request $request)
    {

        $Credentials = [
            'PM_ACCOUNTID' => $request->PM_ACCOUNTID,
            'PM_PASSPHRASE' => $request->PM_PASSPHRASE,
            'PM_MARCHANTID' => $request->PM_MARCHANTID,
            'PM_MARCHANT_NAME' => $request->PM_MARCHANT_NAME,
        ];

        Gateway::where('gateway_code', 'perfectmoney')->first()->update(
            [
                'credentials' => json_encode($Credentials),
                'status' => $request->status == 'on' ? 1 : 0,
            ]
        );

        Flash::success('perfectmoney Setting saved successfully.');
        return redirect()->back();
    }

        public function coinbase()
    {
        $coinbase = Gateway::where('gateway_code', 'coinbase')->first();

        return view('backend.settings.getaway.coinbase', compact('coinbase'));
    }    // ========= perfectmoney ============


    // ========= paystack ============

public function coinbaseStore(Request $request)
    {

        $Credentials = [
            'api_key' => $request->api_key,
            'api_version' => $request->api_version,
            'api_secret' => $request->api_secret,
        ];

        Gateway::where('gateway_code', 'coinbase')->first()->update(
            [
                'credentials' => json_encode($Credentials),
                'status' => $request->status == 'on' ? 1 : 0,
            ]
        );

        Flash::success('coinbase Setting saved successfully.');
        return redirect()->back();
    }

    public function paystack()
    {
        $paystack = Gateway::where('gateway_code', 'paystack')->first();

        return view('backend.settings.getaway.paystack', compact('paystack'));
    }


    //voguepay

    public function paystackStore(Request $request)
    {

        $Credentials = [
            'public_key' => $request->public_key,
            'secret_key' => $request->secret_key,
            'merchant_email' => $request->merchant_email,
        ];

        Gateway::where('gateway_code', 'paystack')->first()->update(
            [
                'credentials' => json_encode($Credentials),
                'status' => $request->status == 'on' ? 1 : 0,
            ]
        );

        Flash::success('Paystack Setting saved successfully.');
        return redirect()->back();
    }

    public function voguepay()
    {
        $voguepay = Gateway::where('gateway_code', 'voguepay')->first();

        return view('backend.settings.getaway.voguepay', compact('voguepay'));
    }

    public function voguepayStore(Request $request)
    {
        $Credentials = [
            'merchant_id' => $request->merchant_id,
        ];

        Gateway::where('gateway_code', 'voguepay')->first()->update(
            [
                'credentials' => json_encode($Credentials),
                'status' => $request->status == 'on' ? 1 : 0,
            ]
        );

        Flash::success('Voguepay Setting saved successfully.');
        return redirect()->back();
    }


    //mtn

    public function mtn()
    {
        $mtn = Gateway::where('gateway_code', 'mtn')->first();

        return view('backend.settings.getaway.mtn', compact('mtn'));
    }

    public function mtnStore(Request $request)
    {
        $Credentials = [
            'primary_key' => $request->primary_key,
            'secondary_key' => $request->secondary_key,
        ];

        Gateway::where('gateway_code', 'mtn')->first()->update(
            [
                'credentials' => json_encode($Credentials),
                'status' => $request->status == 'on' ? 1 : 0,
            ]
        );

        Flash::success('Mtn Setting saved successfully.');
        return redirect()->back();
    }

    public function SendMoneyFee()
    {
        return view('backend.settings.general.send_money_fee');
    }

    public function SendMoneyFeeStore(Request $request)
    {

        $this->settingUpdate('send_money_fee', $request->site_money_fee);
        Flash::success('Site Money Fee Setting saved successfully.');
        return redirect()->back();
    }

    public function referral()
    {
        $wallets = Wallet::all();

        return view('backend.settings.general.referral', compact('wallets'));
    }

    public function referralStore(Request $request)
    {

        $referralSetting = [
            'percentage' => checkbox_filter($request->percentage),
            'commission' => $request->commission,
            'wallet' => $request->wallet,
        ];

        $this->settingUpdate('referral', json_encode($referralSetting));
        Flash::success('Referral Setting saved successfully.');
        return redirect()->back();
    }
}

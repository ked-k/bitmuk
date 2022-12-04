<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mollie\Laravel\Facades\Mollie;
use Schema;

class GetawayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        if (Schema::hasTable('gateways')) {
            //=============== paypal ==============
            $paypalCredential = gateway_info('paypal');;
            $paystackCredential = gateway_info('paystack');;
            $perfectmoneyCredential = gateway_info('perfectmoney');;

            config()->set([
                'paypal.mode' => $paypalCredential->mode,
                'paypal.live.app_id' => $paypalCredential->app_id,
                'paypal.live.client_id' => $paypalCredential->client_id,
                'paypal.live.client_secret' => $paypalCredential->client_secret,
            ]);

            $mollieCredential = gateway_info('mollie');
            Mollie::api()->setApiKey($mollieCredential->api_key);

            config()->set([
                'paystack.publicKey' => $paystackCredential->public_key,
                'paystack.merchantEmail' => $paystackCredential->merchant_email,
                'paystack.secretKey' => $paystackCredential->secret_key,
            ]);

            config()->set([
                'perfectmoney.account_id' => $perfectmoneyCredential->PM_ACCOUNTID,
                'perfectmoney.passphrase' => $perfectmoneyCredential->PM_PASSPHRASE,
                'perfectmoney.marchant_id' => $perfectmoneyCredential->PM_MARCHANTID,
            ]);
        }

    }
}

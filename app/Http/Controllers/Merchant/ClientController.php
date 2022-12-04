<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Predis\Client as ClientRedis;


class ClientController extends Controller
{
    public function currencyWallet(Request $request)
    {

        if (!$request->hasValidSignature()) {
            abort(401);
        }

        $client = new ClientRedis();

        $data = json_decode($client->get('info'), true);


        //return view('merchant.post',compact('statusData','action'));

        $wallets = Wallet::all();


        return view('frontend.merchant.currency', compact('wallets', 'data'));
    }




    public function apiTest(Request $request)
    {

        $parameters = [
            'ref_code' => 'DFU80XZIKS',
            'currency' => 'USD',
            'amount' => 50.00,
            'ipn_url' => 'https://webhook.site/49a36acb-dd05-4502-9c2c-72d4cc390f29',
            'cancel_url' => 'http://example.com/cancel_url.php',
            'success_url' => 'http://example.com/success_url.php',
            'customer_email' => 'john@mail.com',

        ];
        $headers = [
            'Accept: application/json',
            'x-api-key: IvHcUZARLSHOJrt2EA7W8NcQAKwcHfGrGWkDyr2HY2wOwP5HUGlV8Wj9lJUc',
        ];


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_URL, 'http://payrio.test/status/cancel');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        print_r($response);

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Gateway;
use App\Models\Wallet;
use Crypt;
use Http;
use HTTP_Request2;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Mollie\Laravel\Facades\Mollie;
use PerfectMoney;
use Session;
use Shakurov\Coinbase\Facades\Coinbase;
use Str;
use URL;

class DepositController extends Controller
{
     public function deposit()
    {
        $wallet = Wallet::all();
        $gateways = Gateway::where('status', true)->get();
        return view('frontend.deposit.create', compact('wallet','gateways'));
    }


    public function depositPreview(Request $request)
    {

        $requestData = $request->all();


        $wallet = Wallet::where('currency', $requestData['wallet'])->first();

        $gateway = Gateway::find($requestData['gateway']);

        $depositInfo = array_merge($requestData, array('currency_code' => $wallet->currency,'wallet' => $wallet->id));

//        $client = new ClientRedis();
//        $client->set('deposit_info', $depositInfo);

        Session::put('deposit_info', $depositInfo);


        $preview = [
            'amount' => $requestData['amount'],
            'wallet_name' => $wallet->name,
            'gateway_name' => $gateway->name,
            'gateway_logo' => $gateway->logo,
            'description' => $requestData['description'],
        ];


        return view('frontend.deposit.preview', compact('preview'));

    }

    public function depositConfirm(Request $request)
    {

//        $client = new ClientRedis();
//        $depositInfo = json_decode($client->get('deposit_info'));

        $depositInfo = new Fluent(Session::get('deposit_info'));



        $amount = $depositInfo->amount;
        $description = $depositInfo->description;
        $wallet = Wallet::find($depositInfo->wallet);
        $gateway = Gateway::find($depositInfo->gateway);

        $transaction = \Transaction::new($amount, $gateway->name, $wallet->name, $description, 'deposit');
        //transaction create with facade
        $transactionID = $transaction->id;

        $trxid = $transaction->trxid;

       // $client->set('cancel_trx', $transactionID);

        Session::put('cancel_trx', $transactionID);
 
       return  self::gateway($request, $gateway,$depositInfo,$transaction);

    }


    protected function gateway($request,$gateway,$depositInfo,$transaction)
    {


        $depositInfo = new Fluent($depositInfo);
         $amount = $transaction->amount;
        $transactionID = $transaction->id;
        $trxid = $transaction->trxid;

        if ($gateway->gateway_code == 'paypal') {
            $data = $this->paypal();
        }
        elseif ($gateway->gateway_code == 'stripe') {

            $stripeCredential = gateway_info('stripe');

            \Stripe\Stripe::setApiKey($stripeCredential->stripe_secret);

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => $depositInfo->currency_code,
                        'product_data' => [
                            'name' => 'T-shirt',
                        ],
                        'unit_amount' => $amount * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'https://solidpay.trustyscript.com/gateway/stripe?reftrn=' . Crypt::encryptString($transactionID),
                'cancel_url' =>  route('status.cancel'),
            ]);
            return redirect($session->url);

            //return view('frontend.gateway.stripe',compact('transactionID'));
        }
        elseif ($gateway->gateway_code == 'mollie') {


            $payment = Mollie::api()->payments()->create([
                'amount' => [
                    'currency' => $depositInfo->currency_code, // Type of currency you want to send
                    'value' => (string)$amount . '.00', // You must send the correct number of decimals, thus we enforce the use of strings
                ],
                'description' => 'Payment By codehunger',
                'redirectUrl' => route('gateway.mollie', 'reftrn=' . Crypt::encryptString($transactionID)),
            ]);

            //$client->set('m_id', $payment->id);

            Session::put('m_id', $payment->id);

            $payment = Mollie::api()->payments()->get($payment->id);

            // redirect customer to Mollie checkout page
            return redirect($payment->getCheckoutUrl(), 303);
        }
        elseif ($gateway->gateway_code == 'perfectmoney') {

            $paymentUrl = route('gateway.perfectMoney');
            $noPaymentUrl = route('status.cancel');

            return PerfectMoney::render(['PAYMENT_AMOUNT' => $amount, 'PAYMENT_ID' => $transactionID, 'PAYMENT_URL' => $paymentUrl, 'PAYMENT_UNITS' => $depositInfo->currency_code, 'NOPAYMENT_URL' => $noPaymentUrl,'NOPAYMENT_URL_METHOD'=> 'GET']);

        }
        elseif ($gateway->gateway_code == 'coinbase') {

            $charge = Coinbase::createCharge([
                'name' => 'Deposit no #' . $transactionID,
                'description' => 'Deposit',
                "cancel_url" => route('status.cancel'),

                'local_price' => [
                    'amount' => $amount,
                    'currency' => $depositInfo->currency_code,
                ],
                'pricing_type' => 'fixed_price',
                'redirect_url' => route('gateway.coinbase', 'reftrn=' . Crypt::encryptString($transactionID))
            ]);

            return redirect($charge['data']['hosted_url']);

        }
        elseif ($gateway->gateway_code == 'paystack') {

            $info = [
                'email' => auth()->user()->email,
                'amount' => $amount,
                'currency' => $depositInfo->currency_code,
            ];

            $data = $this->paystack($info);
        }
        elseif ($gateway->gateway_code == 'voguepay') {
            $info = [
                'merchant_id' => gateway_info('voguepay')->merchant_id,
                'email' => auth()->user()->email,
                'amount' => $amount,
                'currency' => $depositInfo->currency_code,
                'success_url' => route('gateway.voguepay.success', 'reftrn=' . Crypt::encryptString($transactionID)),
            ];
            $data = $this->voguepay($info);
        }
        elseif ($gateway->gateway_code == 'airtel') {


//            $info = [
//                'merchant_id' => gateway_info('voguepay')->merchant_id,
//                'email' => auth()->user()->email,
//                'amount' => $amount,
//                'currency' => $depositInfo->currency_code,
//                'success_url' => route('gateway.voguepay.success', 'reftrn=' . Crypt::encryptString($transactionID)),
//            ];


            $headers = array(
                'Content-Type' => 'application/json',
            );
            $request_body = array(
                'client_id' => '7794ff5d-6144-4019-8229-4ccd062eb9eb',
                'client_secret' => '43b0df1b-a0fb-4877-8cdb-a39c9ea58e65',
                'grant_type' => 'client_credentials'
            );

            $client = new \GuzzleHttp\Client();

            $response = $client->request('POST','https://openapi.airtel.africa/auth/oauth2/token', array(
                    'headers' => $headers,
                    'json' => $request_body,
                )
            );



            $access_token = json_decode($response->getBody()->getContents())->access_token;



            $headers = array(
                'Content-Type' => 'application/json',
                'X-Country' => 'UG',
                'X-Currency' => 'UGX',
                'Authorization'  =>  $access_token,
            );


            $request_body = [
                "reference" => 'for test',
                "subscriber" => [
                    "country" => "UG",
                    "currency" => "UGX",
                    "msisdn" => $request->airtel_number
                ],
                "transaction" => [
                    "amount" => $amount,
                    "country" => "UG",
                    "currency" => "UGX",
                    "id" =>  $trxid
                ]
            ];

            $response = $client->request('POST','https://openapi.airtel.africa/merchant/v1/payments/', array(
                    'headers' => $headers,
                    'json' => $request_body,
                )
            );


            return redirect(URL::temporarySignedRoute(
                'status.success', now()->addMinutes(2)
            ));

//            $notify = [
//                'card-header' => 'Deposit money',
//                'title' => $wallet->symbol.$depositInfo->amount. ' Deposit Pending',
//                'title2' => '',
//                'p' => "The amount Pending added into your account",
//                'strong' => 'Transaction ID: '.$trxid,
//                'action' => route('user.deposit.now'),
//                'a' => 'Deposit again',
//                'view' => 'user'
//            ];
//
//            return redirect()->route('notify',['data' => $notify]);


        }
        elseif ($gateway->gateway_code == 'mtn') {



            //api user config
            $uuid = Str::uuid()->toString();
            $subscriptionKey = "410ede8a05774376a42f25c1dfc6f473";
            $apiUser = "0eacb1f0-c892-4712-ba1d-1b13e571ec31";
            $apikey = "fb312965907d4b09a2b681743ef8a598";

            // ========== token generate ======================
            $tokenGenerate = new Http_Request2('https://proxy.momoapi.mtn.com/collection/token/');
            $tokenHeaders = array(
                // Request headers
                'Authorization' => 'Basic '. base64_encode($apiUser . ":" . $apikey),
                'Ocp-Apim-Subscription-Key' => $subscriptionKey,
            );

            $tokenGenerate->setHeader($tokenHeaders);
            $tokenGenerate->setMethod(HTTP_Request2::METHOD_POST);

            $tokenResponse = $tokenGenerate->send();
            $access_token = json_decode($tokenResponse->getBody())->access_token;



            //=============== Request Pay ======================
            $requestPay = new Http_Request2('https://proxy.momoapi.mtn.com/collection/v1_0/requesttopay');
            $requestPayUrl = $requestPay->getUrl();

            $requestPayheaders = array(
                // Request headers
                'Authorization' => 'Bearer '.$access_token,
                'X-Reference-Id' => $uuid,
                'X-Target-Environment' => 'mtnuganda',
                'Content-Type' => 'application/json',
                'Ocp-Apim-Subscription-Key' => $subscriptionKey,
            );

            $requestPay->setHeader($requestPayheaders);
            $requestPay->setMethod(HTTP_Request2::METHOD_POST);
            //$depositInfo->currency_code
            $requestPayBody = collect(
                [
                    "amount"=> $amount,
                    "currency" => "UGX",
                    "externalId" => '12345678',
                    "payer" => [
                        "partyIdType"=> "MSISDN",
                        "partyId" => "256".$request->mtn_number
                    ],
                    "payerMessage"=> "Deposit Money in Bitmuk",
                    "payeeNote"=> "Deposit Money"
                ]);
            $requestPay->setBody($requestPayBody);
            $requestPay->send();

            $transaction->update([
                'uuid' => $uuid
            ]);

            return redirect(URL::temporarySignedRoute(
                'status.success', now()->addMinutes(2)
            ));


//            $notify = [
//                'card-header' => 'Deposit money',
//                'title' => $wallet->symbol.$depositInfo->amount. ' Deposit Pending',
//                'title2' => '',
//                'p' => "The amount Pending added into your account",
//                'strong' => 'Transaction ID: '.$trxid,
//                'action' => route('user.deposit.now'),
//                'a' => 'Deposit again',
//                'view' => 'user'
//            ];
//
//            return redirect()->route('notify',['data' => $notify]);




        }

        elseif ($gateway->gateway_code == 'manual') {
            return view('frontend.gateway.manual', compact('transactionID', 'gateway'));
        }

        return view($data['view'], compact('transactionID', 'data'));
    }

    private function paypal()
    {
        $data['view'] = 'frontend.gateway.submit.paypal';
        $data['action'] = route('gateway.paypal');
        $data['method'] = 'post';
        return $data;
    }

    private function paystack($info)
    {
        $data['info'] = $info;
        $data['view'] = 'frontend.gateway.submit.paystack';
        $data['action'] = route('gateway.paystack');
        $data['method'] = 'POST';
        return $data;
    }

    private function voguepay($info)
    {
        $data['info'] = $info;
        $data['view'] = 'frontend.gateway.submit.voguepay';
        $data['action'] = 'https://pay.voguepay.com';
        $data['method'] = 'POST';
        return $data;
    }

    public function merchantDeposit(Request $request)
    {

//        $client = new ClientRedis();
//        $depositInfo = json_decode($client->get('deposit_info'), true);

        $depositInfo = new Fluent(Session::get('deposit_info'));

        $amount = $depositInfo['amount'];
        $description = $depositInfo['details'];

        $wallet = Wallet::find($request->wallet);
        $gateway = Gateway::find($request->gateway);


        //transaction create with facade
        $transactionID = Transaction::new($amount, $gateway->name, $wallet->name, $description, 'deposit', 'paid', 'success', $depositInfo['merchant_id'])->id;

        ///$client->set('deposit_info', json_encode(array_merge($depositInfo, ['currency_code' => $wallet->currency])));


        Session::put('deposit_info', array_merge($depositInfo,['currency_code' => $wallet->currency]));

        if ($gateway->gateway_code == 'paypal') {
            $data = $this->paypal();
        } elseif ($gateway->gateway_code == 'stripe') {

            return view('frontend.gateway.stripe', compact('transactionID'));
        }

        return view($data['view'], compact('transactionID', 'data'));
    }

}

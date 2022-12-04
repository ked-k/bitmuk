<?php

namespace App\Http\Controllers\Merchant;

use Transaction;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DepositController;
use App\Models\Balance;
use App\Models\Gateway;
use App\Models\MerchantPayment;
use App\Models\User;
use App\Models\Wallet;
use DB;
use Doctrine\DBAL\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use NextApps\VerificationCode\VerificationCode;
use NrmlCo\LaravelApiKeys\ApiKey;
use NrmlCo\LaravelApiKeys\ApiKeyType;
use Predis\Client as ClientRedis;
use Redirect;
use Spatie\WebhookServer\WebhookCall;
use URL;
use Session;

class ApiController extends DepositController
{
    public function paymentConnection(Request $request) {





        $merchant = $request->user();



        $apiKeys = $merchant->apiKeys->first();
        $apiMode = $apiKeys->type ?? '';
        $requestData = $request->all();

        $data = array_merge((array)$requestData, ['merchant_id' => $merchant->id, 'payment_id' => unique_str(),'api_mode' => $apiMode ]);

        $paymentInfo = MerchantPayment::create($data);


//        $client = new ClientRedis();
//        $client->set('payment_trx', $paymentInfo->payment_id);


        $data = [
            'success' => true,
            'message' => 'Redirect to url for payment connection',
            'redirect_url' => route('payment.checkout','payment_id='.$paymentInfo->payment_id),
        ];
        return response()->json($data);
    }


    public function checkoutPayment(Request $request)
    {

        Session::put('payment_trx', $request->payment_id);

        $paymentInfo = MerchantPayment::where('payment_id',$request->payment_id)->first();

        $gateways = Gateway::where(function ($query) use ($paymentInfo) {
            $query->where('status', true)
                ->whereJsonContains('supported_currency',[ $paymentInfo->currency ]);

        })->get();



        return view('frontend.merchant.payment.checkout', compact('paymentInfo','gateways'));
    }

    public function verifyPayment(Request $request)
    {

//        $client = new ClientRedis();
//        $paymentId = $client->get('payment_trx');





        $paymentId = Session::get('payment_trx');


        $paymentInfo = MerchantPayment::where('payment_id',$paymentId)->first();


        $wallet = Wallet::where('currency',$paymentInfo->currency)->first();


        $email = $request->email;

        if ($paymentInfo->api_mode == ApiKeyType::PRODUCTION){

            $userExist = User::where('email',$email)->exists();
            if ($userExist){
                VerificationCode::send($email);
            }else{
                return redirect()->back()->withErrors(['User not Exists']);;
            }
        }else{
            $isTestVerifiable = VerificationCode::send($email);

            if ($isTestVerifiable == null) {
                return redirect()->back()->withErrors(['User not Exists']);;
            }

        }

        return view('frontend.merchant.payment.verify',compact('wallet','paymentInfo','email'));

    }

    public function paymentNow(Request  $request)
    {


            $gatewayCode = $request->gateway_code;
            $gateway = Gateway::where('gateway_code',$gatewayCode)->first();

            $paymentId = Session::get('payment_trx');

            $paymentInfo = MerchantPayment::where('payment_id',$paymentId)->first();


          $merchantDes = 'Payment  From -' . $paymentInfo->customer_email;
          $wallet = Wallet::where('currency',$paymentInfo->currency)->first();

          $transaction =  Transaction::new($paymentInfo->amount, setting_get('site_title'), $wallet->name, $merchantDes, 'payment', 'unpaid', 'pending', $paymentInfo->merchant_id);

          $depositInfo = array(
              'txn' => encrypt($transaction->id),
              'amount' => $paymentInfo->amount,
              'currency_code' => $paymentInfo->currency,
              'wallet' => $wallet->id,
              'success_url' => $paymentInfo->success_url,
          );

          Session::put('deposit_info', $depositInfo);

         return self::gateway($request,$gateway,$depositInfo,$transaction);
    }

    public function confirmPayment(Request $request)
    {

//        $client = new ClientRedis();
//        $paymentId = $client->get('payment_trx');



        $paymentId = Session::get('payment_trx');

        $paymentInfo = MerchantPayment::where('payment_id',$paymentId)->first();

        $merchant = User::find($paymentInfo->merchant_id);

        $userEmail = $request->email;

        $wallet = Wallet::where('currency',$paymentInfo->currency)->first();

         $verify =  VerificationCode::verify($request->code, $userEmail);

         if ($verify == true) {


             if ($paymentInfo->api_mode == ApiKeyType::PRODUCTION){

                 $user = User::where('email',$userEmail)->first();
                 $balance = Balance::where('user_id', $user->id)->where('wallet_name', $wallet->name)->first();


                 if ( $balance != null && $balance->amount >= $paymentInfo->amount){
                     $balance->amount -= $paymentInfo->amount;
                     $balance->save();
                     $des = 'Payment  to -' . $merchant->merchant_name;
                     Transaction::new($paymentInfo->amount, setting_get('site_title'), $wallet->name, $des, 'make_payment', 'paid', 'success',$user->id);


                     $merchantBalance = Balance::where('user_id', $merchant->id)->where('wallet_name', $wallet->name)->firstOrNew(
                         ['user_id' => $merchant->id],
                         ['wallet_name' => $wallet->name]
                     );

                     $merchantBalance->amount += $paymentInfo->amount;
                     $merchantBalance->save();
                     $merchantDes = 'Payment  From -' . $user->full_name;
                     Transaction::new($paymentInfo->amount, setting_get('site_title'), $wallet->name, $merchantDes, 'payment', 'paid', 'success', $merchant->id);


                     $data = [
                        'ref_code' => $paymentInfo->ref_code,
                        'api_mode' => $paymentInfo->api_mode,
                        'amount' => $paymentInfo->amount,
                        'currency' => $paymentInfo->currency,
                        'customer_email' => $paymentInfo->customer_email,
                     ];

                     WebhookCall::create()
                         ->doNotVerifySsl()
                         ->url($paymentInfo->ipn_url)
                         ->payload(['status' => 'success', 'data' => $data])
                         ->useSecret($merchant->apiKeys->first()->api_secret)
                         ->dispatch();

                     return redirect($paymentInfo->success_url);
                 }
                 else{
                     $message = 'Efficient balance in your  ' . $wallet->name . ' wallet! ';
                     return redirect()->back()->withErrors([$message]);
                 }


             }
             else{

                 $data = [
                     'ref_code' => $paymentInfo->ref_code,
                     'api_mode' => $paymentInfo->api_mode,
                     'amount' => $paymentInfo->amount,
                     'currency' => $paymentInfo->currency,
                     'customer_email' => $paymentInfo->customer_email,
                 ];

                 WebhookCall::create()
                     ->doNotVerifySsl()
                     ->url($paymentInfo->ipn_url)
                     ->payload(['status' => 'success', 'data' => $data])
                     ->useSecret($merchant->apiKeys->first()->api_secret)
                     ->dispatch();

                 return redirect($paymentInfo->success_url);
             }


         }else{
             return redirect()->back()->withErrors(['Verification code not Match']);
         }



    }


    public function apiDocumentation()
    {

        return view('frontend.merchant.api_documentation');
    }
}

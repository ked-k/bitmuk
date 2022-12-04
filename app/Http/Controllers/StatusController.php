<?php

namespace App\Http\Controllers;

use App\Facades\Transaction;
use App\Models\Balance;
use App\Models\Home;
use App\Models\Merchant;
use App\Models\MerchantPayment;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Fluent;
use Predis\Client as ClientRedis;
use Session;
use Spatie\WebhookServer\WebhookCall;

class StatusController extends Controller
{
    public function ipn($status)
    {
        echo  $status;
    }

    public function success(Request $request)
    {
//        $client = new ClientRedis();
//        $depositInfo = json_decode($client->get('deposit_info'));

        $depositInfo = new Fluent(Session::get('deposit_info'));

//        $trxid = $client->get('cancel_trx');

         $trxid =  Session::get('cancel_trx');

        $trx = \App\Models\Transaction::find($trxid);

        $wallet = Wallet::find($depositInfo->wallet);


        if (isset($depositInfo->success_url) && $depositInfo->success_url) {

            $txnId = decrypt($depositInfo->txn);

            $transaction = \App\Models\Transaction::find($txnId);


            $paymentId = Session::get('payment_trx');

            $paymentInfo = MerchantPayment::where('payment_id',$paymentId)->first();

            $merchant = User::find($paymentInfo->merchant_id);

            $data = [
                'ref_code' => $paymentInfo->ref_code,
                'api_mode' => $paymentInfo->api_mode,
                'amount' => $paymentInfo->amount,
                'currency' => $paymentInfo->currency,
                'customer_email' => $paymentInfo->customer_email,
                'trx_id' => $transaction->trxid,
            ];

            if ($transaction->payment_status == 'paid'){
                $merchantBalance = Balance::where('user_id', $merchant->id)->where('wallet_name', $wallet->name)->firstOrNew(
                    ['user_id' => $merchant->id],
                    ['wallet_name' => $wallet->name]
                );

                $merchantBalance->amount += $paymentInfo->amount;
                $merchantBalance->save();
            }


            $status = $transaction->status;

            WebhookCall::create()
                ->doNotVerifySsl()
                ->url($paymentInfo->ipn_url)
                ->payload(['status' => $status, 'data' => $data])
                ->useSecret($merchant->apiKeys->first()->api_secret)
                ->dispatch();

            return redirect(url($depositInfo->success_url));
        } else {


            $notify = [
                'card-header' => 'Deposit money',
                'title' => $wallet->symbol.$depositInfo->amount. ' Deposit Successfully',
                'title2' => '',
                'p' => "The amount has been successfully added into your account",
                'strong' => 'Transaction ID: '.$trx->trxid,
                'action' => route('user.deposit.now'),
                'a' => 'Deposit again',
                'view' => 'user'
            ];

            return redirect()->route('notify',['data' => $notify]);
        }

    }


    public function cancel(Request $request)
    {

//        $client = new ClientRedis();
//        $trx = json_decode($client->get('cancel_trx'));

        $trx = Session::get('cancel_trx');
        Transaction::update($trx, 'fail', 'unpaid');

        notify()->warning('Deposit Canceled');
        return redirect(route('user.dashboard'));
    }

        public function airtelMoney(Request $request)
    {


       dd($request->all(),'get');

    }

        public function airtelMoneyPost(Request $request)
    {
       dd($request->all(),'post');
    }
}

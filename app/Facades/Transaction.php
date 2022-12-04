<?php

namespace App\Facades;

use App\Events\UserReferred;
use App\Models\Balance;
use App\Models\ReferralRelationship;
use App\Models\User;
use Auth;
use Str;

class Transaction
{


    public  function new($amount, $gateway, $wallet, $description, $type, $payment_status = 'unpaid', $status = 'pending', $userID = null)
    {
        if ($type == 'withdraw') {
            self::withdrawBalance($wallet, $amount);
        }

        $transaction = new \App\Models\Transaction();
        $transaction->user_id = $userID ?? Auth::user()->id;
        $transaction->trxid = strtoupper(Str::random(13));
        $transaction->type = $type;
        $transaction->amount = $amount;
        $transaction->gateway = $gateway;
        $transaction->wallet_name = $wallet;
        $transaction->payment_status = $payment_status;
        $transaction->description = $description;
        $transaction->status = $status;
        $transaction->save();

        return $transaction;
    }

    private function withdrawBalance($walletName, $amount)
    {
        User::find(auth()->user()->id)->removeMoney($amount,$walletName);
    }

    public function update($id, $status, $paymentStatus,$userId=null)
    {
        $transaction = \App\Models\Transaction::find($id);

//        $uId = $userId == null ? auth()->user()->id:$userId;
        $uId = $transaction->user_id;

        $user = User::find($uId);


        if ( $status == 'success' && ($transaction->type == 'deposit' || $transaction->type == 'manual_deposit')) {
            self::walletBalanceAdd($transaction->wallet_name, $transaction->amount, $transaction->user_id);


            if (auth()->check()) {
                $comitionExists = ReferralRelationship::where('user_id', $uId)->exists();

                if (!$comitionExists) {
                    event(new UserReferred(request()->cookie('ref'), $user, $id));
                }
            }


        }

        return $transaction->update(
            [
                'status' => $status,
                'payment_status' => $paymentStatus,
            ]);


    }

    private function walletBalanceAdd($walletName, $amount, $userId = null)
    {

        if (auth()->user()->name == 'admin'){
            $user = User::find($userId);
        }else{
            $user = auth()->user() ?? User::find($userId);
        }

        $balance = Balance::where('user_id', $user->id)->where('wallet_name', $walletName)->firstOrNew(
            ['user_id' => $user->id],
            ['wallet_name' => $walletName]
        );

        $balance->amount += $amount;
        $balance->save();
    }


}

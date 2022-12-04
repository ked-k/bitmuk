<?php

namespace App\Http\Controllers;

use App\Facades\Transaction;
use App\Http\Requests\WithdrawRequest;
use App\Models\Balance;
use App\Models\Wallet;
use App\Models\Withdraw;
use App\Models\WithdrawAccount;

class WithdrawController extends Controller
{
    public function withdraw()
    {

        return view('frontend.withdraw.apply');
    }

    public function withdrawStore(WithdrawRequest $request)
    {
        $RequestData = $request->all();

        $wallet = Balance::find($RequestData['wallet_id']);

        $walletData = Wallet::where('name',$wallet->wallet_name)->first();

        $withdrawMethod = WithdrawAccount::find($request->withdraw_account_id)->withdrawMethod;

        $afterFeePercentage = $request['amount'] + (($withdrawMethod['fee%'] / 100) * $request['amount']);

        $finalAmount = ($afterFeePercentage + $withdrawMethod->fee);


        if ( !($wallet->amount >= (double)$finalAmount) ){
            notify()->warning('Insufficient balance on your wallet');
            return redirect()->back();
        }


        $transaction = Transaction::new($finalAmount, '', $wallet->wallet_name, $RequestData['description'], 'withdraw');

        Withdraw::create([
            'user_id' => auth()->user()->id,
            'transaction_id' => $transaction->id,
            'amount' => $finalAmount,
            'balance_id' => $wallet->id,
            'withdraw_account_id' => $request->withdraw_account_id,
            'description' => $RequestData['description'] ?? '',
        ]);


        $notify = [
            'card-header' => 'Withdraw Request',
            'title' => $walletData->symbol.$request['amount']. ' Withdraw Request Submitted Successfully',
            'title2' => 'Fee: ' . $walletData->symbol.(($withdrawMethod['fee%'] / 100) * $request['amount'] + $withdrawMethod->fee),
            'p' => "Your request is now pending",
            'strong' => 'Transaction ID: '.$transaction->trxid,
            'action' => route('user.withdraw.now'),
            'a' => 'Add Withdraw Request again',
            'view' => 'user'
        ];


        return redirect()->route('notify',['data' => $notify]);

    }
}

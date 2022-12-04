<?php

namespace App\Http\Controllers;

use App\Facades\Transaction;
use App\Http\Requests\SendMoneyRequest;
use App\Models\Balance;
use App\Models\User;
use App\Models\Wallet;
use Auth;
use Illuminate\Http\Request;

class SendMoneyController extends Controller
{


    public function sendMoney()
    {

        $wallets = Wallet::all();
        return view('frontend.money.send', compact('wallets'));
    }


    public function sendMoneyPreview(SendMoneyRequest $request)
    {
        $requestData = $request->all();

        $requestAmount = $requestData['amount'];
        $requestWallet = $requestData['wallet_name'];
        $comition = ((int)$requestAmount * setting_get('send_money_fee')) / 100;
        $finalAmmount = (int)$requestAmount + $comition;

        $recipientUser = User::where('email', $requestData['recipient-email'])->first();

        if ($recipientUser == null) {
            notify()->error('Recipient User Not Found');
            return redirect()->back();
        }

        if (Auth::user()->balance()->exists() && Auth::user()->balance()->where('wallet_name', $requestData['wallet_name'])->first()->amount >= $finalAmmount) {
            $previewData = [
                'amount' => $finalAmmount,
                'fee' => $finalAmmount - $requestAmount,
                'wallet_name' => $requestWallet,
                'full_name' => $recipientUser->full_name,
                'email' => $recipientUser->email,
                'user_id' => $recipientUser->id,
                'msg' => $requestData['msg'],
            ];


            return view('frontend.money.preview_send', compact('previewData'));

        } else {
            $message = 'Efficient balance in your  ' . $requestData['wallet_name'] . ' wallet! ';
            notify()->error($message);
            return redirect()->back();
        }
    }


    public function sendMoneyStore(Request $request)
    {
        $recipientUser = User::find($request->id);

        $wallet = Wallet::where('name',$request->wallet_name)->first();

        $user = auth()->user();
        $balance = Balance::where('user_id', $user->id)->where('wallet_name', $request->wallet_name)->first();
        $balance->amount -= $request->amount;
        $balance->save();
        $des = 'Send Money  to -' . $recipientUser->full_name;
        $myTransaction = Transaction::new($request->amount, '', $request->wallet_name, $des, 'send_money', 'paid', 'success');


        $recipientBalance = Balance::where('user_id', $recipientUser->id)->where('wallet_name', $request->wallet_name)->firstOrNew(
            ['user_id' => $recipientUser->id],
            ['wallet_name' => $request->wallet_name]
        );

        $recipienAmount = ($request->amount - $request->fee);
        $recipientBalance->amount += $recipienAmount;
        $recipientBalance->save();
        $recipientDes = 'Receive Money  From -' . $user->full_name;

         Transaction::new($recipienAmount, '', $request->wallet_name, $recipientDes, 'receive_money', 'paid', 'success', $recipientUser->id);


        $notify = [
            'card-header' => 'Send Money Request',
            'title' => $wallet->symbol.($request['amount']-$request->fee). ' Send Money Successfully',
            'title2' => 'Fee: ' . $wallet->symbol.$request->fee,
            'p' => "Send To : ".$recipientUser->full_name,
            'strong' => 'Transaction ID: '.$myTransaction->trxid,
            'action' => route('user.send.money'),
            'a' => 'Send Money Request again',
            'view' => 'user'
        ];


        return redirect()->route('notify',['data' => $notify]);

        notify()->success('successfully Send Money');
        return redirect()->route('user.dashboard');
    }
}

<?php

namespace App\Http\Controllers\Merchant;


use App\Http\Controllers\Controller;
use App\Models\AccountField;
use App\Models\AccountType;
use App\Models\Balance;
use App\Models\Wallet;
use App\Models\WithdrawAccount;
use App\Models\WithdrawMethod;
use Illuminate\Http\Request;

class WithdrawAccountController extends Controller
{
    public function addAccount()
    {

        $wallet = Wallet::all();
        return view('frontend.merchant.withdraw.account.create', compact('wallet'));
    }

    public function storeAccount(Request $request)
    {

        $customFieldData = $request->except(['_token', 'wallet','withdraw_method']);

        $withdrawAccount = new WithdrawAccount();
        $withdrawAccount->user_id = auth()->user()->id;
        $withdrawAccount->withdraw_method_id = $request->withdraw_method;
        $withdrawAccount->save();

        foreach ($customFieldData as $key => $value) {
            $withdrawAccount->updateAcf($key, $value);
        }


        notify()->success('Successfully Account Added');
        return redirect()->back();

    }


    public function deleteAccount($id)
    {
        $withdrawAccount = WithdrawAccount::find($id);

        foreach ($withdrawAccount->acfs()->get() as $acf){
            $acf->delete();
        }
        $withdrawAccount->delete();

        notify()->success('successfully delete account');
        return redirect()->back();
    }


    public function methodList($currency)
    {
        $withdrawMethod = WithdrawMethod::where('currency',$currency)->where('status',1)->get();

        return json_encode($withdrawMethod);
    }

    public function withdrawAccount($walletId)
    {
        $walletName = Balance::find($walletId)->wallet_name;
        $currency = Wallet::where('name',$walletName)->first()->currency;

        $withdrawAccounts = WithdrawAccount::where('user_id',auth()->user()->id)->get()->map(function ($value) use ($currency) {

            $data = [];

            if ($value->withdrawMethod->currency == $currency){
                return [
                    'name' => $value->withdrawMethod->name,
                    'id' =>  $value->id
                ];
            }

            return $data;

        })->reject(function ($name) {
            return empty($name);
        });

        return json_encode($withdrawAccounts);
    }

    public function methodFields($id)
    {
        $withdrawMethod = WithdrawMethod::find($id);
        return $withdrawMethod->fields;
    }

    public function accountField($id)
    {
        $accountField = AccountField::where('account_type_id', $id)->get();
        return json_encode($accountField);
    }


}

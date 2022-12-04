<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\WithdrawDataTable;
use App\Http\Controllers\Controller;
use App\Models\AccountField;
use App\Models\AccountType;
use App\Models\Transaction;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class WithdrawController extends Controller
{

    public function withdrawRequest(WithdrawDataTable $withdrawDataTable)
    {
        return $withdrawDataTable->render('backend.withdraw.index');
    }


    public function accountType()
    {

        $accountType = AccountType::all();
        return view('backend.withdraw.account_type', compact('accountType'));
    }

    public function accountTypeStore(Request $request)
    {
        AccountType::create([
            'account_type' => $request->account_type
        ]);
        Flash::success('Account Type Created');
        return redirect()->back();
    }

    public function accountTypeDelete($id)
    {
        AccountType::find($id)->delete();
        Flash::success('Account Type Deleted');
        return redirect()->back();
    }

    public function accountField()
    {
        $accountType = AccountType::all();

        $accountField = AccountField::all();

        return view('backend.withdraw.account_field', compact('accountType', 'accountField'));
    }

    public function accountFieldStore(Request $request)
    {
        $typeName = AccountType::find($request->type_id)->account_type;

        AccountField::create([
            'account_type_id' => $request->type_id,
            'field_name' => $typeName . '_' . $request->account_field
        ]);
        Flash::success('Account Field Created');
        return redirect()->back();
    }

    public function accountFieldDelete($id)
    {
        AccountField::find($id)->delete();
        Flash::success('Account Field Deleted');
        return redirect()->back();
    }


    public function approve($id)
    {
        $withdraw = Withdraw::find($id);
        Transaction::find($withdraw->transaction_id)->update([
            'status' => 'success',
            'payment_status' => 'paid',
        ]);
        $withdraw->update([
            'status' => 'success',
        ]);

        Flash::success('Approve successfully.');
        return redirect()->back();
    }

    public function reject($id)
    {
        $withdraw = Withdraw::find($id);



        $transaction  = Transaction::find($withdraw->transaction_id);


        $withdraw->update([
            'status' => 'fail',
        ]);
        \App\Models\User::find($transaction->user_id)->addMoney($transaction->amount,$transaction->wallet_name);

         $transaction->update([
                'status' => 'fail',
                'payment_status' => 'unpaid',
            ]);

        Flash::success('Reject successfully.');
        return redirect()->back();
    }
}

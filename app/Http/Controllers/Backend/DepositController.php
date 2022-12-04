<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ManualDepositDataTable;
use App\Http\Controllers\Controller;
use App\Models\Gateway;
use App\Models\Transaction;
use Laracasts\Flash\Flash;

class DepositController extends Controller
{
    public function depositRequest(ManualDepositDataTable $manualDepositDataTable)
    {
        return $manualDepositDataTable->render('backend.deposit.index');
    }


    public function approve($id)
    {
        \App\Facades\Transaction::update($id, 'success', 'paid');
        Flash::success('Approve successfully.');
        return redirect()->back();
    }

    public function reject($id)
    {

        Transaction::find($id)->update([
            'status' => 'fail',
            'payment_status' => 'unpaid',
        ]);


        Flash::success('Reject successfully.');
        return redirect()->back();
    }

    public function manualGetaway()
    {

        $getaways = Gateway::where('gateway_code', 'manual')->get();

        return view('backend.manual.getaway', compact('getaways'));
    }

    public function deleteGetaway($id)
    {
        Gateway::find($id)->delete();
        Flash::success('Gateway Deleted');
        return redirect()->back();
    }

    public function getawayCreate()
    {
        return view('backend.manual.getaway_create');
    }


}

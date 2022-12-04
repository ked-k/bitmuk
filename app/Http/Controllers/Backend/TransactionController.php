<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TransactionDataTable;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Flash;

class TransactionController extends Controller
{
    public function index(TransactionDataTable $transactionDataTable)
    {
        return $transactionDataTable->render('backend.transaction.index');
    }


    public function approve($id)
    {
        Transaction::find($id)->update([
            'status' => 'success',
            'payment_status' => 'paid',
        ]);

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
}

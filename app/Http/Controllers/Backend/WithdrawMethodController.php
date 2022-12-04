<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\WithdrawMethod;
use Arr;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class WithdrawMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {


        $methods = WithdrawMethod::all();
        return view('backend.withdraw_method.index',compact('methods'));
    }

    /**
     * Show the form for creating a new resource.

     */
    public function create()
    {
        $currency =  Wallet::all()->pluck('currency');
        return view('backend.withdraw_method.create',compact('currency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        
        $data = [
          'name' => $request->getaway_name,
          'currency' => $request->currency,
          'min' => $request->min_amount,
          'max' => $request->max_amount,
          'fee' => $request->fixed_fee,
          'fee%' => $request->percentage_fee,
          'fields' => json_encode($request->fields),
        ];
        WithdrawMethod::create($data);
        Flash::success('Withdraw Method Create successfully.');
        return redirect()->route('admin.withdraw.method.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(WithdrawMethod $withdrawMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit($id)
    {
        $withdrawMethod = WithdrawMethod::find($id);
        $currency =  Wallet::all()->pluck('currency');

        return view('backend.withdraw_method.edit',compact('withdrawMethod','currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {

        $filtered = Arr::where($request->fields, function ($value) {
            return $value['name'] != null ;
        });


        $data = [
            'name' => $request->getaway_name,
            'currency' => $request->currency,
            'min' => $request->min_amount,
            'max' => $request->max_amount,
            'fee' => $request->fixed_fee,
            'fee%' => $request->percentage_fee,
            'fields' => json_encode($filtered),
        ];

        $withdrawMethod = WithdrawMethod::find($id);
        $withdrawMethod->update($data);
        Flash::success('Withdraw Method Updated successfully.');
        return redirect()->route('admin.withdraw.method.index');
    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy($id)
    {
        $withdrawMethod = WithdrawMethod::find($id);
        $withdrawMethod->delete();

        Flash::success('Withdraw Method Deleted successfully.');
        return redirect()->route('admin.withdraw.method.index');
    }

    public function changeStatus(Request $request)
    {
        $withdrawMethodr = WithdrawMethod::find($request->id);
        $withdrawMethodr->status = $request->status;
        $withdrawMethodr->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}

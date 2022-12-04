<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\WalletDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateWalletRequest;
use App\Http\Requests\Backend\UpdateWalletRequest;
use App\Models\Wallet;

use Arr;
use Flash;
use Response;
use PragmaRX\Countries\Package\Countries;

class WalletController extends AppBaseController
{
    /**
     * Display a listing of the Wallet.
     *
     * @param WalletDataTable $walletDataTable
     * @return Response
     */
    public function index(WalletDataTable $walletDataTable)
    {
        return $walletDataTable->render('backend.wallets.index');
    }

    /**
     * Show the form for creating a new Wallet.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {

        $countries = new Countries();

        $currencies = $countries->all()->map(function ($value, $key) {
            $currency = $value->hydrateCurrencies()->currencies->first();

            $currencyName = array_keys($value->currencies->toArray());

            return collect([
                'name' => $currency->name ?? '',
                'currency' => $currencyName[0] ?? '',
                'symbol' => $currency->units->major->symbol ?? '',
            ]);
        })->toArray();


        $currencies = Arr::where($currencies, function ($value) {
            return $value['name'] != "" ;
        });


        return view('backend.wallets.create',compact('currencies'));
    }



    /**
     * Store a newly created Wallet in storage.
     *
     * @param CreateWalletRequest $request
     *
     * @return Response
     */
    public function store(CreateWalletRequest $request)
    {
        $input = json_decode($request->currency,true);


        /** @var Wallet $wallet */
        $wallet = Wallet::create($input);

        Flash::success('Wallet saved successfully.');

        return redirect(route('admin.wallets.index'));
    }

    /**
     * Display the specified Wallet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Wallet $wallet */
        $wallet = Wallet::find($id);

        if (empty($wallet)) {
            Flash::error('Wallet not found');

            return redirect(route('admin.wallets.index'));
        }

        return view('backend.wallets.show')->with('wallet', $wallet);
    }

    /**
     * Show the form for editing the specified Wallet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Wallet $wallet */
        $wallet = Wallet::find($id);

        $countries = new Countries();

        $currencies = $countries->all()->map(function ($value, $key) {
            $currency = $value->hydrateCurrencies()->currencies->first();

            $currencyName = array_keys($value->currencies->toArray());

            return collect([
                'name' => $currency->name ?? '',
                'currency' => $currencyName[0] ?? '',
                'symbol' => $currency->units->major->symbol ?? '',
            ]);
        })->toArray();


        $currencies = Arr::where($currencies, function ($value) {
            return $value['name'] != "" ;
        });


        if (empty($wallet)) {
            Flash::error('Wallet not found');

            return redirect(route('admin.wallets.index'));
        }

        return view('backend.wallets.edit',compact('currencies'))->with('wallet', $wallet);
    }

    /**
     * Update the specified Wallet in storage.
     *
     * @param int $id
     * @param UpdateWalletRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWalletRequest $request)
    {
        /** @var Wallet $wallet */
        $wallet = Wallet::find($id);

        if (empty($wallet)) {
            Flash::error('Wallet not found');

            return redirect(route('admin.wallets.index'));
        }


        $input = json_decode($request->currency,true);

        $wallet->fill($input);
        $wallet->save();

        Flash::success('Wallet updated successfully.');

        return redirect(route('admin.wallets.index'));
    }

    /**
     * Remove the specified Wallet from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var Wallet $wallet */
        $wallet = Wallet::find($id);

        if (empty($wallet)) {
            Flash::error('Wallet not found');

            return redirect(route('admin.wallets.index'));
        }

        $wallet->delete();

        Flash::success('Wallet deleted successfully.');

        return redirect(route('admin.wallets.index'));
    }
}

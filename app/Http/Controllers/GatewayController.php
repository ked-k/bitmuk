<?php

namespace App\Http\Controllers;

use Transaction;
use App\Helpers\FileHelper;
use App\Models\Gateway;
use App\Models\Wallet;
use Arr;
use Crypt;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Laracasts\Flash\Flash;
use Mollie;
use Paystack;
use Predis\Client as ClientRedis;
use Redirect;
use Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use URL;

class GatewayController extends Controller
{

    public function gatewayFilter($id)
    {
        $wallet = Wallet::find($id);
        $gateway = Gateway::where('status', true)->get();
        $filtered = $gateway->filter(function ($value) use ($wallet) {
            return in_array($wallet->currency, json_decode($value->supported_currency));
        })->except(['credentials', 'supported_currency']);

        return json_encode($filtered);
    }


//    ************************************* Paypal Config **********************************************************

    public function paypalGateway(Request $request)
    {

//        $client = new ClientRedis();
//        $depositInfo = json_decode($client->get('deposit_info'));

        $depositInfo = new Fluent(Session::get('deposit_info'));

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('gateway.paypal.success'),
                "cancel_url" => route('gateway.paypal.cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $depositInfo->currency_code,
                        "value" => $depositInfo->amount,
                    ],
                    'reference_id' => $request->transaction_id,

                ]
            ],
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('user.dashboard')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('user.dashboard')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paypalSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);


        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $transactionId = (int)$response['purchase_units'][0]['reference_id'];
            Transaction::update($transactionId, 'success', 'paid');

            return redirect(URL::temporarySignedRoute(
                'status.success', now()->addMinutes(2)
            ));

        } else {
            return redirect()
                ->route('user.deposit.now')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }


    public function paypalCancel()
    {
        return redirect(route('status.cancel'));
    }


//    ************************************* stripe Config **********************************************************

    public function stripeGateway(Request $request)
    {
        $ref = Crypt::decryptString($request->reftrn);
        Transaction::update($ref, 'success', 'paid');
        return redirect(URL::temporarySignedRoute(
            'status.success', now()->addMinutes(2)
        ));
    }


    public function perfectMoney(Request $request)
    {
        $ref = Crypt::decryptString($request->PAYMENT_ID);
        Transaction::update($ref, 'success', 'paid');
        return redirect(URL::temporarySignedRoute(
            'status.success', now()->addMinutes(2)
        ));
    }


    // mollie

    public function mollieGateway(Request $request)
    {
//        $client = new ClientRedis();
//        $paymentId = $client->get('m_id');

        $paymentId = Session::get('m_id');

        $payment = Mollie::api()->payments()->get($paymentId);

        if ($payment->isPaid()) {
            $ref = Crypt::decryptString($request->reftrn);

            Transaction::update($ref, 'success', 'paid');
            return redirect(URL::temporarySignedRoute(
                'status.success', now()->addMinutes(2)
            ));
        }

        return redirect(route('status.cancel'));


    }



    //coinbase
    public function coinbase(Request $request)
    {
            $ref = Crypt::decryptString($request->reftrn);
            Transaction::update($ref, 'success', 'paid');
            return redirect(URL::temporarySignedRoute(
                'status.success', now()->addMinutes(2)
            ));
    }


    //paystack

    public function paystack()
    {
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    public function paystackCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        if ($paymentDetails['data']['status'] == 'success') {
            $transactionId = (int)$paymentDetails['data']['reference'];
            Transaction::update($transactionId, 'success', 'paid');

            return redirect(URL::temporarySignedRoute(
                'status.success', now()->addMinutes(2)
            ));

        } else {
            return redirect()->route('status.cancel');
        }
    }

    //voguepaySuccess

    public function voguepaySuccess(Request $request)
    {
        $ref = Crypt::decryptString($request->reftrn);
        Transaction::update($ref, 'success', 'paid');

        return redirect(URL::temporarySignedRoute(
            'status.success', now()->addMinutes(2)
        ));
    }

    public function manualGateway(Request $request)
    {

        \App\Models\Transaction::find($request->transaction_id)->update([
            'description' => 'TRNX : ' . $request->prof_transaction,
            'type' => 'manual_deposit',
        ]);

        Flash::success('Awaiting Deposit Approval.');
        return redirect()->route('user.dashboard');
    }


    //admin manual section Getaway

    public function index()
    {

        $getaways = Gateway::where('gateway_code', 'manual')->get();

        return view('backend.manual.getaway', compact('getaways'));
    }


    public function create()
    {
        return view('backend.manual.getaway_create');
    }


    public function store(Request $request)
    {


        // $position = Location::get('103.77.188.201');

        $requestData = $request->all();

        $image = FileHelper::uploadImage($request);

        $name = $requestData['getaway_name'];
        $credentials = Arr::pluck($requestData['addmore'], 'value', 'name');
        $gatewayCode = 'manual';
        $supportedCurrency = ['BDT'];


        Gateway::create([
            'gateway_code' => $gatewayCode,
            'name' => $name,
            'logo' => 'img/' . $image,
            'credentials' => json_encode($credentials),
            'supported_currency' => json_encode($supportedCurrency),
        ]);
        Flash::success('Gateway Create successfully.');
        return redirect()->route('admin.manual.gateway.index');

    }


    public function edit($id)
    {
        $gateway = Gateway::find($id);
        return view('backend.manual.getaway_edit', compact('gateway'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();


        $image = FileHelper::uploadImage($request);


        $name = $requestData['getaway_name'];
        $credentials = Arr::pluck($requestData['addmore'], 'value', 'name');
        $gatewayCode = 'manual';
        $supportedCurrency = ['BDT'];


        $gateway = Gateway::find($id);

        $logo = $image ? 'img/' . $image : $gateway->logo;

        $gateway->update([
            'gateway_code' => $gatewayCode,
            'name' => $name,
            'logo' => $logo,
            'credentials' => json_encode(array_filter($credentials)),
            'supported_currency' => json_encode($supportedCurrency),
        ]);

        Flash::success('Gateway Update successfully.');
        return redirect()->route('admin.manual.gateway.index');
    }

    public function destroy($id)
    {
        Gateway::find($id)->delete();
        Flash::success('Gateway Deleted');
        return redirect()->back();
    }


    public function changeStatus(Request $request)
    {
        $user = Gateway::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'Status change successfully.']);
    }


}

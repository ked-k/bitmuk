<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Predis\Client as ClientRedis;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::middleware('auth:api_key')->post('/payment', function (Request $request) {

    $merchant = $request->user()->id;
    $requestData = $request->all();

    $data = array_merge((array)$requestData, ['merchant_id' => $merchant]);

    $client = new ClientRedis();
    $client->set('deposit_info', json_encode($data));

    $data = [
        'success' => true,
        'message' => 'Payment Initiated. Redirect to url.',
        'url' => URL::temporarySignedRoute('test.currency', now()->addMinutes(60)),
    ];

    return response()->json($data);

});

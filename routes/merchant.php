<?php

use App\Http\Controllers\DepositController;
use App\Http\Controllers\GatewayController;
use App\Http\Controllers\Merchant\ApiController;
use App\Http\Controllers\Merchant\ClientController;
use App\Http\Controllers\Merchant\MerchantController;
use App\Http\Controllers\Merchant\WithdrawAccountController;
use App\Http\Controllers\Merchant\WithdrawController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Merchant Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Merchant routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "merchant" middleware group. Now create something great!
|
*/

//================================ Login Merchant ============================




Route::group(['middleware' => ['XSS']], function () {


Route::get('/merchant/register', [MerchantController::class, 'showRegistrationForm']);

Route::group(['prefix' => 'merchant', 'middleware' => ['merchant', 'statusCheck'], 'as' => 'merchant.'], function () {
    Route::get('/dashboard', [MerchantController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [MerchantController::class, 'profile'])->name('profile');
    Route::post('/profile-update', [MerchantController::class, 'profileUpdate'])->name('profile.update');


    Route::get('api-mode', [MerchantController::class, 'apiMode'])->name('api.mode');

    // kyc update
    Route::get('kyc', [MerchantController::class, 'kyc'])->name('kyc');
    Route::post('kyc-update', [MerchantController::class, 'kycUpdate'])->name('kyc.update');

    //======================= withdraw =======================================
    Route::group(['prefix' => 'withdraw', 'as' => 'withdraw.'], function () {
        Route::get('/add-account', [WithdrawAccountController::class, 'addAccount'])->name('add.account');
        Route::get('/account-field/{id}', [WithdrawAccountController::class, 'accountField']);
        Route::post('/store-account', [WithdrawAccountController::class, 'storeAccount'])->name('store.account');

        Route::get('/delete-account/{id}', [WithdrawAccountController::class, 'deleteAccount'])->name('delete.account');

        Route::get('/method-list/{currency}', [WithdrawAccountController::class, 'methodList']);
        Route::get('/account/{walletId}', [WithdrawAccountController::class, 'withdrawAccount']);
        Route::get('/method-fields/{id}', [WithdrawAccountController::class, 'methodFields']);

        Route::get('/', [WithdrawController::class, 'withdraw'])->name('now')->middleware('kycStatus');
        Route::get('/store', [WithdrawController::class, 'withdrawStore'])->name('store')->middleware('kycStatus');
    });


    //filter
    Route::group(['prefix' => 'filter', 'as' => 'filter.'], function () {
        Route::get('trx', [MerchantController::class, 'trxFilter'])->name('trx');
    });


    Route::get('/change-password', [MerchantController::class, 'changePassword'])->name('change.password');
    Route::post('/password-store', [MerchantController::class, 'newPassword'])->name('new.password');


    Route::get('close-account', [UserController::class, 'closeAccount'])->name('close.account');
});

Route::get('/filter/{id}', [GatewayController::class, 'gatewayFilter']);



Route::group(['prefix' => 'payment' , 'as' => 'payment.' ], function (){
    //api connection
    Route::post('connection' , [ApiController::class, 'paymentConnection'])->name('connection')->middleware('auth:api_key');

    //payment process
    Route::get('checkout', [ApiController::class, 'checkoutPayment'])->name('checkout');
    Route::get('verify', [ApiController::class, 'verifyPayment'])->name('verify');
    Route::post('confirm', [ApiController::class, 'paymentNow'])->name('confirm');

});

Route::get('api-documentation',[ApiController::class, 'apiDocumentation'])->name('api.documentation');



// for client user site

Route::get('api-test', [ClientController::class, 'apiTest']);

});


Route::post('logout', [UserController::class, 'logout'])->name('logout');

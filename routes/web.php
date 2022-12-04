<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\GatewayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Merchant\ClientController;
use App\Http\Controllers\SendMoneyController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawAccountController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppBaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('clear', function () {
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    return redirect()->route('home');
});


Route::group(['middleware' => ['XSS']], function () {


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('cron-job',[AppBaseController::class,'cronJob']);


//********************************* user management ****************************
Route::group(['middleware' => ['auth:web', 'user', 'statusCheck','verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile-update', [UserController::class, 'profileUpdate'])->name('profile.update');

    Route::get('/change-password', [UserController::class, 'changePassword'])->name('change.password');
    Route::post('/password-store', [UserController::class, 'newPassword'])->name('new.password');

    // kyc update
    Route::get('kyc', [UserController::class, 'kyc'])->name('kyc');
    Route::post('kyc-update', [UserController::class, 'kycUpdate'])->name('kyc.update');

    //filter
    Route::group(['prefix' => 'filter', 'as' => 'filter.'], function () {
        Route::get('trx', [UserController::class, 'trxFilter'])->name('trx');
    });


    // support ticket
    Route::group(['prefix' => 'support', 'as' => 'support.'], function () {
        Route::get('ticket-create', [UserController::class, 'ticketCreate'])->name('ticket.create');
        Route::post('ticket-store', [UserController::class, 'ticketStore'])->name('ticket.store');
        Route::get('ticket-list', [UserController::class, 'supportTickets'])->name('ticket.index');

        Route::get('ticket-details/{id}', [UserController::class, 'ticketDetails'])->name('ticket.details');

        Route::post('ticket-comment', [UserController::class, 'ticketComment'])->name('ticket.comment');
    });

    Route::get('close-account', [UserController::class, 'closeAccount'])->name('close.account');


    Route::get('apply-merchant', [UserController::class, 'applyMerchant'])->name('apply.merchant');
    Route::post('apply-merchant-store', [UserController::class, 'applyMerchantStore'])->name('apply.merchant.store');

    //======================= Deposit =======================================
    Route::group(['prefix' => 'deposit', 'as' => 'deposit.'], function () {
        Route::get('/', [DepositController::class, 'deposit'])->name('now');
        Route::post('/preview', [DepositController::class, 'depositPreview'])->name('preview');
        Route::get('/confirm', [DepositController::class, 'depositConfirm'])->name('confirm');
    });


    //======================= withdraw =======================================
    Route::group(['middleware' => ['kycStatus'], 'prefix' => 'withdraw', 'as' => 'withdraw.'], function () {
        Route::get('/add-account', [WithdrawAccountController::class, 'addAccount'])->name('add.account');

        Route::post('/store-account', [WithdrawAccountController::class, 'storeAccount'])->name('store.account');
        Route::get('/delete-account/{id}', [WithdrawAccountController::class, 'deleteAccount'])->name('delete.account');

        Route::get('/method-list/{currency}', [WithdrawAccountController::class, 'methodList']);
        Route::get('/account/{walletId}', [WithdrawAccountController::class, 'withdrawAccount']);
        Route::get('/method-fields/{id}', [WithdrawAccountController::class, 'methodFields']);



        Route::get('/', [WithdrawController::class, 'withdraw'])->name('now');
        Route::get('/store', [WithdrawController::class, 'withdrawStore'])->name('store');
    });


    //============================ Send money =========================================

    Route::group(['middleware' => ['kycStatus'], 'as' => 'send.'], function () {
        Route::get('send-money', [SendMoneyController::class, 'sendMoney'])->name('money');
        Route::post('send-money-preview', [SendMoneyController::class, 'sendMoneyPreview'])->name('money.preview');
        Route::post('send-money-store', [SendMoneyController::class, 'sendMoneyStore'])->name('money.store');
    });

});





//====================  Gateway Payment ===========================
Route::group(['prefix' => 'gateway', 'as' => 'gateway.'], function () {
    //filter------------->
    Route::get('/filter/{id}', [GatewayController::class, 'gatewayFilter']);

    //paypal------------>
    Route::post('/paypal', [GatewayController::class, 'paypalGateway'])->name('paypal');
    Route::get('/paypal-success', [GatewayController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('/paypal-cancel', [GatewayController::class, 'paypalCancel'])->name('paypal.cancel');

    //stripe------------------>
    Route::get('stripe', [GatewayController::class, 'stripeGateway'])->name('stripe');

    //mollie
    Route::get('mollie', [GatewayController::class, 'mollieGateway'])->name('mollie');
    Route::post('webhooks/mollie', [GatewayController::class, 'mollieHandleWebhookNotification'])->name('webhooks.mollie');

    //perfect money
    Route::get('perfectMoney', [GatewayController::class, 'perfectMoney'])->name('perfectMoney');

    //perfect money
    Route::get('coinbase', [GatewayController::class, 'coinbase'])->name('coinbase');

    //paystack
    Route::post('paystack', [GatewayController::class, 'paystack'])->name('paystack');
    Route::get('paystack/callback', [GatewayController::class, 'paystackCallback'])->name('paystack.callback');


    Route::get('voguepay/success', [GatewayController::class, 'voguepaySuccess'])->name('voguepay.success');


    Route::post('manual', [GatewayController::class, 'manualGateway'])->name('manual');
});

//====================  Gateway Status ===========================
Route::group(['prefix' => 'status', 'as' => 'status.'], function () {
    Route::get('/ipn', [StatusController::class, 'ipn'])->name('ipn');
    Route::get('/success', [StatusController::class, 'success'])->name('success');
    Route::match(['get','post'],'/cancel', [StatusController::class, 'cancel'])->name('cancel');
});

Route::get('airtel-money/pay',[StatusController::class, 'airtelMoney']);
Route::post('airtel-money/pay',[StatusController::class, 'airtelMoneyPost']);

//********************************* Home Page ****************************

//send money rate status
Route::get('currency-convert', [HomeController::class, 'currencyConvert']);

//pages
Route::get('page/{name}', [HomeController::class, 'getPage']);
Route::get('faq/{categoryId}', [HomeController::class, 'getFaq'])->name('faq.category');

//blog

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/details/{id}', [BlogController::class, 'details'])->name('details');
});

// subscribe

Route::post('subscribe-now', [HomeController::class, 'nowSubscribe'])->name('subscribe.now');

Route::post('contact-now', [HomeController::class, 'contactNow'])->name('contact.now');


Route::get('notify',[HomeController::class, 'notify'])->name('notify');

});

Route::post('logout', [UserController::class, 'logout'])->name('logout');


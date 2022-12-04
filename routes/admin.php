<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BestUserController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DepositController;
use App\Http\Controllers\Backend\FaqCategoryController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\HomeCounterController;
use App\Http\Controllers\Backend\HomeFeatureController;
use App\Http\Controllers\Backend\HomeGatewayController;
use App\Http\Controllers\Backend\HomeReferralController;
use App\Http\Controllers\Backend\HomeSolutionController;
use App\Http\Controllers\Backend\HomeSpecialController;
use App\Http\Controllers\Backend\HomeStepController;
use App\Http\Controllers\Backend\HomeTestimonialController;
use App\Http\Controllers\Backend\KycController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\LogController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ScategoryController;
use App\Http\Controllers\Backend\HowItWorkController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SubscribeController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TicketController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WalletController;
use App\Http\Controllers\Backend\WithdrawController;
use App\Http\Controllers\Backend\WithdrawMethodController;
use App\Http\Controllers\GatewayController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

//================================ Login admin ============================


Route::group(['middleware' => ['XSS']], function () {


Route::get('login', [AdminController::class, 'showLoginForm']);
Route::post('login', [AdminController::class, 'login'])->name('login');



//================================= Admin Dashboard Home ============================
Route::group(['middleware' => ['auth:admin', 'preventBackHistory']], function () {

    Route::post('update', [UserController::class, 'adminUpdate']);
    Route::post('update/password', [UserController::class, 'updatePassword'])->name('update.password');

    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //User Resource
    Route::resource('users', UserController::class);
    Route::get('user/changeStatus', [UserController::class, 'changeStatus']);
    Route::get('user/change2fa', [UserController::class, 'change2fa']);
    Route::get('kyc/update', [UserController::class, 'kycUpdate'])->name('kyc.update');

    //balance
    Route::get('add-balance-view/{id}', [UserController::class, 'addBalanceView'])->name('add.balance.view');
    Route::post('add-balance', [UserController::class, 'addBalance'])->name('add.balance');

    Route::get('remove-balance-view/{id}', [UserController::class, 'removeBalanceView'])->name('remove.balance.view');
    Route::post('remove-balance', [UserController::class, 'removeBalance'])->name('remove.balance');


    Route::get('merchant', [UserController::class, 'merchant'])->name('merchant');
    Route::get('merchant/edit/{id}', [UserController::class, 'edit'])->name('merchant.edit');


    //Transaction Section

    Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');

    Route::get('transaction-approve/{id}', [TransactionController::class, 'approve'])->name('transaction.approve');
    Route::get('transaction-reject/{id}', [TransactionController::class, 'reject'])->name('transaction.reject');

    //Support Ticket Category Resource
    Route::resource('scategories', ScategoryController::class);

    //Support Ticket
    Route::get('tickets', [TicketController::class, 'tickets'])->name('ticket');
    Route::get('close-tickets', [TicketController::class, 'closeTickets'])->name('close.ticket');
    Route::get('ticket-details/{id}', [TicketController::class, 'ticketDetails'])->name('ticket.details');
    Route::get('ticket-close/{id}', [TicketController::class, 'ticketClose'])->name('ticket.close');
    Route::post('ticket-comment', [TicketController::class, 'ticketComment'])->name('ticket.comment');

    //LogActivity
    Route::get('admin-log-activity', [LogController::class, 'adminLogActivity'])->name('log.activity');
    Route::get('login-log-activity', [LogController::class, 'loginLogActivity'])->name('login.log');

    // =========================================================== Settings =========================================================================

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('/', [SettingController::class, 'settings'])->name('dashboard');
        Route::get('general-setting', [SettingController::class, 'generalSetting'])->name('general');
        Route::post('general', [SettingController::class, 'generalSettingStore'])->name('general.store');

        Route::get('social-link-setting', [SettingController::class, 'socialLink'])->name('social');
        Route::post('social-link', [SettingController::class, 'socialLinkStore'])->name('social.store');

        Route::get('gdrp', [SettingController::class, 'gdrp'])->name('gdrp');
        Route::post('gdrp/store', [SettingController::class, 'gdrpStore'])->name('gdrp.store');

        //send money

        Route::get('send-money-fee', [SettingController::class, 'SendMoneyFee'])->name('send.money.fee');
        Route::post('send-money-fee/store', [SettingController::class, 'SendMoneyFeeStore'])->name('send.money.fee.store');

        //Referral Setting

        Route::get('referral', [SettingController::class, 'referral'])->name('referral');
        Route::post('referral/store', [SettingController::class, 'referralStore'])->name('referral.store');

        //tawk
        Route::get('plugin/tawk', [SettingController::class, 'tawk'])->name('tawk');
        Route::post('plugin/tawk/store', [SettingController::class, 'tawkStore'])->name('tawk.store');

        //google recaptcha
        Route::get('plugin/google-recaptcha', [SettingController::class, 'googleRecaptcha'])->name('google.recaptcha');
        Route::post('plugin/google-recaptcha/store', [SettingController::class, 'googleRecaptchaStore'])->name('google.recaptcha.store');

        //google analytics
        Route::get('plugin/google-analytics', [SettingController::class, 'googleAnalytics'])->name('google.analytics');
        Route::post('plugin/google-analytics/store', [SettingController::class, 'googleAnalyticsStore'])->name('google.analytics.store');
        //facebook analytics
        Route::get('plugin/facebook-analytics', [SettingController::class, 'facebookAnalytics'])->name('facebook.analytics');
        Route::post('plugin/facebook-analytics/store', [SettingController::class, 'facebookAnalyticsStore'])->name('facebook.analytics.store');

        // Home Setting
        Route::get('home-page', [SettingController::class, 'homePage'])->name('home.page');
        Route::post('home-page/store', [SettingController::class, 'homePageStore'])->name('home.page.store');


        //getaway Setting
        Route::group(['prefix' => 'getaway', 'as' => 'getaway.'], function () {

        Route::get('/', [SettingController::class, 'getaway']);

        //paypal
        Route::get('paypal', [SettingController::class, 'paypal'])->name('paypal');
        Route::post('paypal/store', [SettingController::class, 'paypalStore'])->name('paypal.store');

        //stripe
        Route::get('stripe', [SettingController::class, 'stripe'])->name('stripe');
        Route::post('stripe/store', [SettingController::class, 'stripeStore'])->name('stripe.store');

        //mollie
        Route::get('mollie', [SettingController::class, 'mollie'])->name('mollie');
        Route::post('mollie/store', [SettingController::class, 'mollieStore'])->name('mollie.store');

        //perfectmoney
        Route::get('perfectmoney', [SettingController::class, 'perfectmoney'])->name('perfectmoney');
        Route::post('perfectmoney/store', [SettingController::class, 'perfectmoneyStore'])->name('perfectmoney.store');

        //coinbase
        Route::get('coinbase', [SettingController::class, 'coinbase'])->name('coinbase');
        Route::post('coinbase/store', [SettingController::class, 'coinbaseStore'])->name('coinbase.store');

        //paystack
        Route::get('paystack', [SettingController::class, 'paystack'])->name('paystack');
        Route::post('paystack/store', [SettingController::class, 'paystackStore'])->name('paystack.store');

        //voguepay
        Route::get('voguepay', [SettingController::class, 'voguepay'])->name('voguepay');
        Route::post('voguepay/store', [SettingController::class, 'voguepayStore'])->name('voguepay.store');

        //mtn pay
        Route::get('mtn', [SettingController::class, 'mtn'])->name('mtn');
        Route::post('mtn/store', [SettingController::class, 'mtnStore'])->name('mtn.store');

        });

    });

    // =========================================================== End Settings =========================================================================


    //Language Resource
    Route::resource('/languages', LanguageController::class);
    //Language Details
    Route::post('languages/details/store', [LanguageController::class, 'storeLanguageDetails'])->name('languages.details.store');
    Route::delete('languages/details/destroy/{id}', [LanguageController::class, 'languageDetailsDestroy'])->name('languages.details.destroy');
    Route::post('languages/details/get', [LanguageController::class, 'getLanguageDetail'])->name('languages.details.get');
    Route::post('languages.details.update', [LanguageController::class, 'updateLanguageDetails'])->name('languages.details.update');

    //wallets
    Route::resource('wallets', WalletController::class);

    //WITHDRAW Management
    Route::group(['prefix' => 'withdraw', 'as' => 'withdraw.'], function () {

        Route::get('method/changeStatus', [WithdrawMethodController::class, 'changeStatus']);
        Route::resource('method', WithdrawMethodController::class);


        Route::get('/request', [WithdrawController::class, 'withdrawRequest'])->name('request');


        Route::get('/account/type', [WithdrawController::class, 'accountType'])->name('account.type');
        Route::post('/account/type/store', [WithdrawController::class, 'accountTypeStore'])->name('account.type.store');
        Route::get('/account/type/delete/{id}', [WithdrawController::class, 'accountTypeDelete'])->name('account.type.delete');

        Route::get('/account/field', [WithdrawController::class, 'accountField'])->name('account.field');
        Route::post('/account/field/store', [WithdrawController::class, 'accountFieldStore'])->name('account.field.store');
        Route::get('/account/field/delete/{id}', [WithdrawController::class, 'accountFieldDelete'])->name('account.field.delete');

        Route::get('withdraw-approve/{id}', [WithdrawController::class, 'approve'])->name('approve');
        Route::get('withdraw-reject/{id}', [WithdrawController::class, 'reject'])->name('reject');
    });
    Route::group(['prefix' => 'manual', 'as' => 'manual.'], function () {

        Route::resource('gateway', GatewayController::class)->except('show');

        Route::get('gateway/changeStatus', [GatewayController::class, 'changeStatus']);

        Route::get('/deposit', [DepositController::class, 'depositRequest'])->name('deposit.request');
        Route::get('deposit-approve/{id}', [DepositController::class, 'approve'])->name('deposit.approve');
        Route::get('deposit-reject/{id}', [DepositController::class, 'reject'])->name('deposit.reject');
    });

    Route::get('manage-menus/{id?}', [MenuController::class, 'index'])->name('menus');
    Route::post('create-menu', [menuController::class, 'store'])->name('create.menu');
    Route::get('add-custom-link', [menuController::class, 'addCustomLink']);

    //pages Management
    Route::resource('pages', PageController::class);

    //Home Page Management

    Route::get('home-page', [HomeController::class, 'homePage'])->name('home.page');
    Route::get('home-page-status', [HomeController::class, 'homePageStatus'])->name('home.page.status');
    Route::get('home/{section}', [HomeController::class, 'homeSection'])->name('home.section');
    Route::patch('home/update/{id}', [HomeController::class, 'homeSectionUpdate'])->name('home.section.update');

    Route::post('/update-page-order', [HomeController::class, 'updatePageOrder'])->name('update.order');

// ==================================   Home Section ==================================
    Route::resource('blogs', BlogController::class);
    Route::resource('bestUsers', BestUserController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('homeSpecials', HomeSpecialController::class);
    Route::resource('homeSolutions', HomeSolutionController::class);
    Route::resource('homeSteps', HomeStepController::class);
    Route::resource('homeReferrals', HomeReferralController::class);
    Route::resource('homeCounters', HomeCounterController::class);
    Route::resource('homeTestimonials', HomeTestimonialController::class);
    Route::resource('homeFeatures', HomeFeatureController::class);
    Route::resource('homeGateways', HomeGatewayController::class);
    Route::resource('subscribes', SubscribeController::class);


    //faq
    Route::resource('faqs', FaqController::class);
    Route::resource('faqCategories', FaqCategoryController::class);

    //kyc
    Route::resource('kycs', KycController::class)->only(['index', 'show']);

    //how it works
    Route::resource('howItWorks', HowItWorkController::class);

    Route::post('logout', [adminController::class, 'logout'])->name('logout');

});

});



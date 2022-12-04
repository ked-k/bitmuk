<?php

namespace App\Http\Controllers\Merchant;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Kyc;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithdrawAccount;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use NrmlCo\LaravelApiKeys\ApiKey;
use NrmlCo\LaravelApiKeys\ApiKeyType;
use Illuminate\Http\Request;
use NrmlCo\LaravelApiKeys\LaravelApiKeys;

class MerchantController extends Controller
{
    use  RegistersUsers;

    private $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }


    public function showRegistrationForm()
    {
        return view('frontend.merchant.auth.register');
    }


    public function dashboard()
    {

        $name = \auth()->user()->merchant_name;
        LaravelApiKeys::create('SANDBOX', ['name' => $name]);

        $transactions = Transaction::where('user_id', \auth()->user()->id)->latest()->paginate(10);


        return view('frontend.merchant.dashboard', compact('transactions'));
    }

    public function profile()
    {
        $withdrawAccounts = WithdrawAccount::where('user_id', \auth()->user()->id)->get();
        return view('frontend.merchant.profile',compact('withdrawAccounts'));
    }

    public function profileUpdate(Request $request)
    {
        $user = \auth()->user();
        $modifyData = array(
            'password' => Hash::make($request->password),
            'avatar' => FileHelper::uploadImage($request, 'image', $user),
        );

        $user->fill(array_merge($request->all(), $modifyData));
        $user->save();

        notify()->success('Successfully merchant updated');

        return redirect()->route('merchant.dashboard');
    }

    //kyc update


    public function kyc()
    {
        $fields = [
            [
                'label' => __('Driving license / Passport'),
                'name' => 'driving_or_passport'
            ],
            [
                'label' => __('Selfe'),
                'name' => 'selfe'
            ]
        ];

        $kyc = Kyc::where('user_id', $this->user->id)->first();
        return view('frontend.merchant.kyc', compact('kyc', 'fields'));
    }

    public function kycUpdate(Request $request)
    {

        $kyc = Kyc::where('user_id', $this->user->id)->first();


        $selfe = FileHelper::uploadImage($request, 'selfe', $kyc);
        $passport = FileHelper::uploadImage($request, 'driving_or_passport', $kyc);

        Kyc::updateOrCreate(
            ['user_id' => $this->user->id],
            [
                'status' => Kyc::PENDING,
                'selfe' => $selfe,
                'driving_or_passport' => $passport
            ]

        );
        notify()->success('Successfully Submit');
        return redirect()->back();
    }

    public function apiMode()
    {

        $ApiKey = ApiKey::where('user_id', \auth()->user()->id)->first();

        if ($ApiKey->type == ApiKeyType::SANDBOX) {

            $ApiKey->update([
                'type' => ApiKeyType::PRODUCTION
            ]);

        } elseif ($ApiKey->type == ApiKeyType::PRODUCTION) {
            $ApiKey->update([
                'type' => ApiKeyType::SANDBOX
            ]);
        }

        notify()->success('Api Mode Update Successfully');
        return redirect()->back();
    }

    public function trxFilter(Request $request)
    {

        $transactions = Transaction::where(function ($query) use ($request) {
            $query->where('user_id', $this->user->id);

            if ($request->type) {
                $query->where('type', $request->type);
            }
            if ($request->time) {
                $date = Carbon::now()->subDays($request->time);
                $query->where('created_at', '>=', $date);
            }
        })->latest()->paginate(10);
        return view('frontend.merchant.trx_filter', compact('transactions'));
    }


    public function changePassword()
    {
        return view('frontend.merchant.change_password');
    }


    public function newPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        notify()->success('Password Changed Successfully');
        return redirect()->back();

    }


    public function closeAccount()
    {

    }

}

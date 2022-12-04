<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\Kyc;
use App\Models\Scategory;
use App\Models\Ticket;
use App\Models\TicketComment;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithdrawAccount;
use App\Models\WithdrawMethod;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use NrmlCo\LaravelApiKeys\LaravelApiKeys;

class UserController extends Controller
{

    private $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }


    public function dashboard(Request $request)
    {

        $transactions = Transaction::where('user_id', $this->user->id)->orderBy('id', 'DESC')->paginate(10);


        return view('frontend.user.dashboard', compact('transactions'));
    }

    public function profile()
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

        $withdrawAccounts = WithdrawAccount::where('user_id',$this->user->id)->get();

        return view('frontend.user.profile', compact('kyc', 'fields','withdrawAccounts'));
    }


    public function applyMerchant()
    {
        return view('frontend.user.merchant');
    }

    public function applyMerchantStore(Request $request)
    {

        $user = \auth()->user()->update([
            'role' => 'merchant',
            'merchant_name' => $request->merchant_name,
            'merchant_email' => $request->merchant_email,
            'merchant_address' => $request->merchant_address,
            'merchant_proof' => $request->merchant_proof,
            'status' => false,
        ]);


        LaravelApiKeys::create('SANDBOX', ['name' => $request->merchant_name]);

        notify()->success('Successfully apply merchant account');

        return redirect()->route('user.dashboard');

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

        notify()->success('Successfully user updated');

        return redirect()->route('user.dashboard');
    }

    public function changePassword()
    {
        return view('frontend.user.change_password');
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
        return view('frontend.user.kyc', compact('kyc', 'fields'));
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


    //support ticket

    public function supportTickets()
    {

        return view('frontend.support.index');
    }

    public function ticketCreate()
    {
        $department = Scategory::all();
        return view('frontend.support.create', compact('department'));
    }

    public function ticketStore(Request $request)
    {

        $data = [
            'user_id' => $this->user->id,
            'scategory_id' => $request->department_id,
            'ticket_id' => strtoupper(Str::random(10)),
            'title' => $request->title,
            'priority' => 'high',
            'message' => $request->message,
            'status' => 1,
        ];
        $ticket = Ticket::create($data);
        notify()->success('Your ticket successfully submitted');
        return redirect()->route('user.support.ticket.details',$ticket->id);

    }

    public function ticketDetails($id)
    {
        $ticket = Ticket::with(['comments'])->find($id);


        return view('frontend.support.ticket_details', compact('ticket'));
    }

    public function ticketComment(Request $request)
    {
        $data = [
            'ticket_id' => $request->ticket_id,
            'user_id' => $this->user->id,
            'comment' => $request->comment,
        ];

        TicketComment::create($data);
        Ticket::find($request->ticket_id)->update(['status' => 1]);
        notify()->success('Your reply submitted');
        return redirect()->back();
    }

    // filter

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
        return view('frontend.user.trx_filter', compact('transactions'));
    }


    public function closeAccount()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $user->status = 0;
        $user->save();
        notify()->success('Successfully your account closed now');

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

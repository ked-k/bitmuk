<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gateway;
use App\Models\ReferralRelationship;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Arr;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $date = Carbon::now()->subDays(7);
        $deposit = Transaction::where(function ($query) use ($date) {
            $query->where('type', 'deposit');
            $query->where('status', 'success');
            $query->where('created_at', '>=', $date);
        })->get()->groupBy(function ($data) {
            return $data->created_at->format('Y-m-d');
        })->map(function ($row) {
            return $row->sum('amount');
        })->toArray();


        $days = 7;
        for ($i = 0; $i != $days; $i++ ){
            $loopDate = Carbon::now()->subDays($i)->format('Y-m-d');
            $filteredDeposit = Arr::exists($deposit, $loopDate);

            if (!$filteredDeposit){
                $deposit[$loopDate] = 0;
            }

        }

        $deposit = Arr::sortRecursive($deposit);



        $totalDeposit = Transaction::where(function ($query) {
            $query->where('type', 'deposit');
            $query->where('status', 'success');
        })->count();

        $totalReferralCom = Transaction::where(function ($query) {
            $query->where('type', 'referral');
            $query->where('status', 'success');
        })->count();

        $totalTransfer = Transaction::count();

        $recentUser = User::latest()->limit(6)->get();
        $totalUser = User::where('role', 'user')->count();
        $totalMerchant = User::where('role', 'merchant')->count();
        $totalWithdraw = Withdraw::count();

        $totalReferral = ReferralRelationship::count();

        $totalPaymentGateway = Gateway::count();


        $counts = [
            [
                'level' => 'Total User',
                'count' => $totalUser,
                'bg' => 'bg-danger',
                'icon' => 'far fa-user',
            ],
            [
                'level' => 'Total Merchant',
                'count' => $totalMerchant,
                'bg' => 'bg-warning',
                'icon' => 'fas fa-user-astronaut',
            ],
            [
                'level' => 'Number Of Deposits',
                'count' => $totalDeposit,
                'bg' => 'bg-info',
                'icon' => 'fas fa-money-check-alt',
            ],
            [
                'level' => 'Number Of Withdraws',
                'count' => $totalWithdraw,
                'bg' => 'bg-success',
                'icon' => 'fas fa-hand-holding-usd',
            ],
            [
                'level' => 'Number Of Transactions',
                'count' => $totalTransfer,
                'bg' => 'bg-info',
                'icon' => 'fas fa-comments-dollar',
            ],
            [
                'level' => 'Total Referral',
                'count' => $totalReferral,
                'bg' => 'bg-primary',
                'icon' => 'fas fa-id-card-alt',
            ],
            [
                'level' => 'Number Of Referral Bonus',
                'count' => $totalReferralCom,
                'bg' => 'bg-danger',
                'icon' => 'fas fa-money-bill',
            ],
            [
                'level' => 'Total Payment Gateway',
                'count' => $totalPaymentGateway,
                'bg' => 'bg-warning',
                'icon' => 'fas fa-pallet',
            ]
        ];

        return view('backend.home', compact('recentUser', 'counts', 'deposit'));
    }
}

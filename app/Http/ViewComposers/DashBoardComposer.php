<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class DashBoardComposer
{

    private $trxType;
    private $trxTime;

    public function __construct()
    {

        $this->trxType = [
            'deposit' => 'Deposit',
            'manual_deposit' => 'Manual Deposit',
            'send_money' => 'Send Money',
            'referral' => 'Referral',
            'withdraw' => 'Withdraw',
            'receive_money' => 'Receive Money',
            'payment' => 'Payment',
            'make_payment' => 'Make Payment'
        ];

        $this->trxTime = [
            7 => 'Last Days',
            15 => 'Last 15Days',
            30 => 'Last Month',
            360 => 'Last Year',
        ];

    }

    public function compose(View $view)
    {
        $view->with(['trxType' => $this->trxType, 'trxTime' => $this->trxTime]);
    }
}

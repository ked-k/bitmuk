<?php

namespace App\Listeners;

use App\Events\UserReferred;
use App\Facades\Transaction;
use App\Models\ReferralLink;
use App\Models\ReferralRelationship;

class RewardUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\UserReferred $event
     * @return void
     */
    public function handle(UserReferred $event)
    {
        $referral = ReferralLink::find($event->referralId);
        if (!is_null($referral)) {
            ReferralRelationship::create(['referral_link_id' => $referral->id, 'user_id' => $event->user->id]);

            // Deposit...
            if ($referral->program->name === 'Deposit') {

                $referralSetting = setting_get('referral');
                $transaction = \App\Models\Transaction::find($event->trnId);

                $walletName = $referralSetting->wallet;
                $amount = $referralSetting->commission;
                $dis = 'earn form -' . $event->user->full_name . 'by referral link';

                if ($referralSetting->percentage == true) {
                    $walletName = $transaction->wallet_name;
                    $amount = ((int)$transaction->amount * $referralSetting->commission) / 100;
                }

                $provider = $referral->user;
                $provider->addMoney($amount, $walletName);
                Transaction::new($amount, ' ', $walletName, $dis, 'referral', 'paid', 'success', $provider->id);
            }


        }
    }
}

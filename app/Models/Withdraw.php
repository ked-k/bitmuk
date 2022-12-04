<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    protected $appends = ['currency_amount'];

    public static $roles = [
        'amount' => 'required',
        'wallet_id' => 'required',
        'withdraw_account_id' => 'required',
    ];
    /**
     * @var mixed
     */

    protected $guarded = ['id'];


    public function balance()
    {
        return $this->belongsTo(Balance::class,'balance_id','id')->withDefault();
    }



    public function getCurrencyAmountAttribute()
    {
        $wallet = Wallet::where('name',$this->balance->wallet_name)->first();
        return ($wallet->symbol ??''). $this->amount . ' ' . ($wallet->currency ?? '');



    }
}

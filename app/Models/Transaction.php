<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['currency_amount'];


    public function getCurrencyAmountAttribute()
    {
        $wallet = Wallet::where('name',$this->wallet_name)->first();
        return ($wallet->symbol ??''). $this->amount . ' ' . ($wallet->currency ?? '');


    }
}

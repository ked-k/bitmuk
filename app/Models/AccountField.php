<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountField extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function accountType()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id')->withDefault();
    }
}

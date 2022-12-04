<?php

namespace App\Models;

use App\Http\Traits\HasAcf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawAccount extends Model
{
    use HasFactory, HasAcf;

    protected $guarded = ['id'];


    public function withdrawMethod()
    {
        return $this->belongsTo(WithdrawMethod::class)->withDefault();
    }
}

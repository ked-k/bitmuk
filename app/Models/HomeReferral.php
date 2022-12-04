<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HomeReferral
 * @package App\Models
 * @version February 26, 2022, 4:37 am UTC
 *
 * @property string $name
 * @property string $amount
 */
class HomeReferral extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'amount' => 'required'
    ];
    public $table = 'home_referrals';
    public $fillable = [
        'name',
        'amount'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'amount' => 'string'
    ];


}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Wallet
 * @package App\Models
 * @version January 11, 2022, 6:46 am UTC
 *
 * @property string $name
 * @property string $currency
 * @property integer $rate_usd
 */
class Wallet extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'currency' => 'required',
    ];
    public $table = 'wallets';
    public $fillable = [
        'name',
        'currency',
        'symbol'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'currency' => 'string',
    ];

    public function getSymbolAttribute($value)
    {
        if ($value == 'Tk'){
            return '৳';
        }
        return $value;
    }

}

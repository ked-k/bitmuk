<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Subscribe
 * @package App\Models
 * @version February 9, 2022, 6:08 am UTC
 *
 * @property string $email
 * @property enum['active' $status
 */
class Subscribe extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required'
    ];
    public $table = 'subscribes';
    public $fillable = [
        'email',
        'status'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string'
    ];


}

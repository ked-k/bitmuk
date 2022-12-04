<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HomeGateway
 * @package App\Models
 * @version February 26, 2022, 5:52 am UTC
 *
 * @property string $image
 * @property string $link
 */
class HomeGateway extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required'
    ];
    public $table = 'home_gateways';
    public $fillable = [
        'image',
        'link'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'string',
        'link' => 'string'
    ];


}

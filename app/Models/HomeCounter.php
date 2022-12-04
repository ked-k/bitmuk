<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HomeCounter
 * @package App\Models
 * @version February 26, 2022, 5:13 am UTC
 *
 * @property string $icon
 * @property string $value
 * @property string $title
 */
class HomeCounter extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'icon' => 'required',
        'value' => 'required',
        'title' => 'required'
    ];
    public $table = 'home_counters';
    public $fillable = [
        'icon',
        'value',
        'title'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'icon' => 'string',
        'value' => 'string',
        'title' => 'string'
    ];


}

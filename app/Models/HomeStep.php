<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HomeStep
 * @package App\Models
 * @version February 26, 2022, 10:31 am +06
 *
 * @property string $title
 * @property string $content
 */
class HomeStep extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'icon' => 'required',
        'title' => 'required',
        'content' => 'required'
    ];
    public $table = 'home_steps';
    public $fillable = [
        'icon',
        'title',
        'content'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'content' => 'string'
    ];


}

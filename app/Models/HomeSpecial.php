<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HomeSpecial
 * @package App\Models
 * @version February 25, 2022, 9:22 pm +06
 *
 * @property string $icon
 * @property string $title
 * @property string $content
 */
class HomeSpecial extends Model
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
    public $table = 'home_specials';
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
        'icon' => 'string',
        'title' => 'string',
        'content' => 'string'
    ];


}

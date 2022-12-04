<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HomeSolution
 * @package App\Models
 * @version February 25, 2022, 10:55 pm +06
 *
 * @property string $image
 * @property string $title
 * @property string $content
 */
class HomeSolution extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required',
        'title' => 'required',
        'content' => 'required'
    ];
    public $table = 'home_solutions';
    public $fillable = [
        'image',
        'title',
        'content'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'string',
        'title' => 'string',
        'content' => 'string'
    ];


}

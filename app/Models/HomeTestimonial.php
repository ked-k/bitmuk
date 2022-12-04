<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HomeTestimonial
 * @package App\Models
 * @version February 26, 2022, 5:25 am UTC
 *
 * @property string $title
 * @property string $image
 * @property string $name
 * @property string $content
 */
class HomeTestimonial extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'image' => 'required',
        'name' => 'required',
        'content' => 'required'
    ];
    public $table = 'home_testimonials';
    public $fillable = [
        'title',
        'image',
        'name',
        'content'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'image' => 'string',
        'name' => 'string',
        'content' => 'string'
    ];


}

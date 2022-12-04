<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Blog
 * @package App\Models
 * @version February 8, 2022, 5:53 am UTC
 *
 * @property string $title
 * @property string $image
 * @property string $details
 */
class Blog extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'details' => 'required'
    ];
    public $table = 'blogs';
    public $fillable = [
        'title',
        'image',
        'details',
        'tags'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'image' => 'string',
        'details' => 'string'
    ];


}

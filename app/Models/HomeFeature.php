<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HomeFeature
 * @package App\Models
 * @version February 26, 2022, 5:49 am UTC
 *
 * @property string $title
 * @property string $content
 */
class HomeFeature extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'content' => 'required'
    ];
    public $table = 'home_features';
    public $fillable = [
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

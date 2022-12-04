<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Page
 * @package App\Models
 * @version February 6, 2022, 6:44 am UTC
 *
 * @property string $title
 * @property string $slug
 * @property string $component
 * @property string $type
 */
class Page extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'label' => 'required',
        'component' => 'required'
    ];
    public $table = 'pages';
    public $fillable = [
        'label',
        'component',
        'type',
        'url'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'label' => 'string',
        'component' => 'string',
        'type' => 'string'
    ];


}

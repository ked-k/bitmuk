<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Team
 * @package App\Models
 * @version February 9, 2022, 6:02 am UTC
 *
 * @property string $name
 * @property string $title
 * @property string $image
 * @property string $social
 */
class Team extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'title' => 'required',
    ];
    public $table = 'teams';
    public $fillable = [
        'name',
        'title',
        'image',
        'social'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'title' => 'string',
        'image' => 'string',
        'social' => 'string'
    ];


}

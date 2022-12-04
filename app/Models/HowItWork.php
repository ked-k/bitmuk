<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HowItWork
 * @package App\Models
 * @version March 16, 2022, 6:25 am UTC
 *
 * @property string $icon
 * @property string $title
 * @property string $description
 */
class HowItWork extends Model
{

    use HasFactory;

    public $table = 'how_it_works';
    



    public $fillable = [
        'icon',
        'title',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'icon' => 'string',
        'title' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'icon' => 'required',
        'title' => 'required',
        'description' => 'required'
    ];

    
}

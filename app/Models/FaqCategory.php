<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FaqCategory
 * @package App\Models
 * @version February 9, 2022, 6:16 am UTC
 *
 * @property string $name
 */
class FaqCategory extends Model
{

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];
    public $table = 'faq_categories';
    public $fillable = [
        'name'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];


}

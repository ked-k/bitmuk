<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Faq
 * @package App\Models
 * @version February 9, 2022, 6:18 am UTC
 *
 * @property string $title
 * @property string $details
 */
class Faq extends Model
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
    public $table = 'faqs';
    public $fillable = [
        'title',
        'details',
        'faq_category_id'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'details' => 'string'
    ];


}

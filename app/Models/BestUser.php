<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BestUser
 * @package App\Models
 * @version February 9, 2022, 5:51 am UTC
 *
 * @property string $name
 * @property string $image
 */
class BestUser extends Model
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
    public $table = 'best_users';
    public $fillable = [
        'name',
        'image'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'image' => 'string'
    ];


}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Scategory
 * @package App\Models
 * @version January 3, 2022, 10:01 am UTC
 *
 * @property string $name
 */
class Scategory extends Model
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
    public $table = 'scategories';
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

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'scategory_id', 'id');
    }


}

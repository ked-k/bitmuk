<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Kyc
 * @package App\Models
 * @version February 22, 2022, 11:30 am +06
 *
 * @property string $nid_name
 * @property string $nid_number
 * @property string $nid_copy
 */
class Kyc extends Model
{

    use HasFactory;

    public const  APPROVED = 'approved';
    public const REJECTED = 'rejected';
    public const PENDING = 'pending';
    public $table = 'kycs';
    protected $fillable = [
        'user_id',
        'selfe',
        'driving_or_passport',
        'status'
    ];


}

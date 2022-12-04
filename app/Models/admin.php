<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use HasFactory;

    public static $rules = [
        'email' => 'required',
        'password' => 'required',
    ];
    protected $guarded = ['id'];
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
    ];
    protected $hidden = ['password'];

    public function ticketComment()
    {
        return $this->hasMany(TicketComment::class);
    }

}

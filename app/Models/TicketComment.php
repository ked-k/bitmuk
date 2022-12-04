<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TicketComment extends Model
{
    use HasFactory, LogsActivity;

    public static $rules = [
        'ticket_id' => 'required',
        'comment' => 'required'
    ];
    protected static $logAttributes = ['comment'];
    protected static $logOnlyDirty = true;
    protected $with = ['admin'];
    protected $fillable = [
        'ticket_id', 'user_id', 'comment'
    ];
    protected $casts = [
        'ticket_id' => 'integer',
        'user_id' => 'integer',
        'comment' => 'string',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class)->withDefault();
    }

    public function admin()
    {
        return $this->belongsTo(admin::class, 'user_id')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }
}

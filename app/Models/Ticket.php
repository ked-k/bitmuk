<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Ticket extends Model
{
    use HasFactory, LogsActivity;

    const PRIORITY = [
        'low', 'medium', 'high',
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'priority' => ['required', Ticket::PRIORITY],
        'message' => 'required'
    ];
    protected static $logAttributes = ['status'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'support ticket';
    protected $fillable = [
        'user_id', 'scategory_id', 'ticket_id', 'title', 'priority', 'message', 'status'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'scategory_id' => 'integer',
        'ticket_id' => 'string',
        'title' => 'string',
        'priority' => 'string',
        'message' => 'string',
        'status' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(Scategory::class, 'scategory_id')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function comments()
    {
        return $this->hasMany(TicketComment::class);
    }
}

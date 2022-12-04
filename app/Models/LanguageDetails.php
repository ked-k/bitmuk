<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageDetails extends Model
{
    use HasFactory;

    /**
     * Store Language Validation Rules
     */
    public static $storeLanguageDetailRules =
        [
            'key' => 'required',
            'value' => 'required',
        ];
    /**
     * Store Language Validation Messages
     */
    public static $storeLanguageDetailMessages =
        [
            'key.required' => 'A language key is required',
            'value.required' => 'A language value is required',
        ];
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the Language that owns the Language Details.
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    /**
     * Store Language Validation Rules
     */
    public static $storeLanguageRules =
        [
            'name' => 'required',
            'code' => 'required',
        ];
    /**
     * Store Language Validation Messages
     */
    public static $storeLanguageMessages =
        [
            'name.required' => 'A language name is required',
            'code.required' => 'A language code is required',
        ];
    /**
     * Update Language Validation Rules
     */
    public static $updateLanguageRules =
        [
            'name' => 'required',
            'code' => 'required',
        ];
    /**
     * Update Language Validation Messages
     */
    public static $updateLanguageMessages =
        [
            'name.required' => 'A language name is required',
            'code.required' => 'A language code is required',
        ];
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Language has many key & value
     */
    public function languageDetails()
    {
        return $this->hasMany(LanguageDetails::class);
    }


}

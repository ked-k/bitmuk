<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Language::$updateLanguageRules;
    }

    /**
     * Get the validation Message that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return Language::$updateLanguageMessages;
    }
}

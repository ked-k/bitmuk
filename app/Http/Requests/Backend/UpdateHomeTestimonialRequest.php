<?php

namespace App\Http\Requests\Backend;

use App\Models\HomeTestimonial;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeTestimonialRequest extends FormRequest
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
        $rules = HomeTestimonial::$rules;

        return $rules;
    }
}
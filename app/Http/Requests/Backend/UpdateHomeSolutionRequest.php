<?php

namespace App\Http\Requests\Backend;

use App\Models\HomeSolution;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeSolutionRequest extends FormRequest
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
        $rules = HomeSolution::$rules;

        return $rules;
    }
}

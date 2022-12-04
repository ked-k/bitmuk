<?php

namespace App\Http\Requests\Backend;

use App\Models\HomeGateway;
use Illuminate\Foundation\Http\FormRequest;

class CreateHomeGatewayRequest extends FormRequest
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
        return HomeGateway::$rules;
    }
}

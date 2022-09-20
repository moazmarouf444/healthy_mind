<?php

namespace App\Http\Requests\Api\Doctor\Auth;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends BaseApiRequest
{

    public function rules()
    {
        return [
            'image' => 'sometimes|required|image',
            'name' => 'sometimes|required|max:50',
            'country_code' => 'sometimes|required|numeric|digits_between:2,5',
            'phone' => 'sometimes|required|numeric|digits_between:9,10|unique:doctors,phone,' . auth()->id(),
            'email' => 'sometimes|required|email|max:50|unique:doctors,email,' . auth()->id(),
            'specialization' => 'sometimes|in:doctor,specialist',
            'biography' => 'sometimes|min:6',
        ];
    }
}

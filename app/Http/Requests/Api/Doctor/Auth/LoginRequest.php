<?php

namespace App\Http\Requests\Api\Doctor\Auth;

use App\Http\Requests\Api\BaseApiRequest;

class LoginRequest extends BaseApiRequest
{

    public function rules()
    {
        return [
            'email'       => 'required|email|exists:doctors,email|max:50',
            'password'    => 'required|min:6|max:100',
            'device_id'   => 'required|max:250',
            'device_type' => 'required|in:ios,android,web',
        ];
    }
}

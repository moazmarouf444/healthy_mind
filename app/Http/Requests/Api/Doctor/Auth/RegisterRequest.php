<?php

namespace App\Http\Requests\Api\Doctor\Auth;
use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Http\Request;
use function fixPhone;

class RegisterRequest extends BaseApiRequest
{
    public function __construct(Request $request)
    {
        $request['phone'] = fixPhone($request['phone']);
        $request['country_code'] = fixPhone($request['country_code']);
    }

    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:doctors,email|max:50',
            'country_code' => 'required|numeric|digits_between:2,5',
            'phone' => 'required|numeric|digits_between:9,10|unique:doctors,phone',
            'address' => 'required|min:6|max:100',
            'biography' => 'required|min:6',
            'password' => 'required|min:6|max:100',
            'logo' => 'required',
            'lighted' => 'required',
            'specialization' => 'required|in:doctor,specialist',
        ];
    }
}

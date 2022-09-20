<?php

namespace App\Http\Requests\Api\Doctor\Auth;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordRequest extends BaseApiRequest
{

    public function rules() {
        return [
            'old_password' => 'required|min:6|max:100',
            'password'     => 'required|min:6|max:100',
            'password_confirmation'     => ['same:password'],
        ];
    }
    public function withValidator($validator) {
        $validator->after(function ($validator) {
            if ($this->has('old_password') && !Hash::check($this->old_password, auth()->user()->password)) {
                $validator->errors()->add('old_password', trans('auth.incorrect_old_pass'));
            }
        });
    }
}

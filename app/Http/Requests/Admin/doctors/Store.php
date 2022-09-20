<?php

namespace App\Http\Requests\Admin\doctors;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'required|max:191',
            'phone'    => 'required|min:10|unique:doctors,phone',
            'email'    => 'required|email|max:191|unique:doctors,email,NULL,NULL,deleted_at,NULL',
            'address'    => 'required||max:191',
            'biography'    => 'required',
            'password' => ['required', 'min:6'],
            'image'   => ['required', 'image'],
            'logo'   => 'required',
            'lighted'   =>'required',
            'specialization'   => 'required|in:doctor,specialist',
            'profit_ratio'   => 'required',
            'session_price'   => 'required',
        ];
    }
}

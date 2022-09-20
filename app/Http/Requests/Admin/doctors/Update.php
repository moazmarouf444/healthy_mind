<?php

namespace App\Http\Requests\Admin\doctors;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'required|max:191',
            'phone'                 => 'required|numeric|unique:doctors,phone,'.$this->id,
            'email'                 => 'required|email|max:191|unique:doctors,email,'.$this->id,
            'type'                  => 'required_if:type,good',
            'password'              => ['nullable','max:191'],
            'image'                => ['nullable','image'],
            'address'    => 'required||max:191',
            'biography'    => 'required',
            'logo'   => 'nullable',
            'lighted'   =>'nullable',
            'is_blocked'       => 'required',
            'is_approved'      => 'required',
            'specialization'   => 'required|in:doctor,specialist',
            'profit_ratio'   => 'required',
            'session_price'   => 'required',

        ];
    }
}

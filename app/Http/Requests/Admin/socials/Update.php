<?php

namespace App\Http\Requests\Admin\socials;

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
            'image'  => 'nullable|image' ,
            'link'  => 'required|url' ,
            'name'  => 'required' ,
        ];
    }
}

<?php

namespace App\Http\Requests\Admin\introductions;

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
            'image'                => ['required','image'],
            'title.ar'       => 'required' ,
            'title.en'       => 'required' ,
            'description.ar' => 'required' ,
            'description.en' => 'required' ,
        ];
    }
}

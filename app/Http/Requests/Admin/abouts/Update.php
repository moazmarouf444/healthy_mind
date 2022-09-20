<?php

namespace App\Http\Requests\Admin\abouts;

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
            'title.ar'       => 'required' ,
            'title.en'       => 'required' ,
            'description.ar' => 'required' ,
            'description.en' => 'required' ,
        ];
    }
}

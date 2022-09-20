<?php

namespace App\Http\Requests\Admin\socialphobiatests;

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
            'name.ar' => 'required'  ,
            'name.en' => 'required'  ,
            'biography.ar' => 'required'  ,
            'biography.en' => 'required'  ,
        ];
    }
}

<?php

namespace App\Http\Requests\Admin\helps;

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
            'question.ar'       => 'required' ,
            'question.en'       => 'required' ,
            'answer.ar' => 'required' ,
            'answer.en' => 'required' ,
        ];
    }
}

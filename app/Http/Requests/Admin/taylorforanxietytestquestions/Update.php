<?php

namespace App\Http\Requests\Admin\taylorforanxietytestquestions;

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
            'yes.ar'       => 'required' ,
            'yes.en'       => 'required' ,
            'no.ar'       => 'required' ,
            'no.en'       => 'required' ,
            'value_yes'       => 'required' ,
            'value_no'       => 'required' ,

        ];
    }
}

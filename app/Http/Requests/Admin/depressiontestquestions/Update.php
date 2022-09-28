<?php

namespace App\Http\Requests\Admin\depressiontestquestions;

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

            'answer_zero.ar'       => 'required' ,
            'answer_zero.en'       => 'required' ,
            'answer_one.ar'       => 'required' ,
            'answer_one.en'       => 'required' ,
            'answer_two.ar'       => 'required' ,
            'answer_two.en'       => 'required' ,
            'answer_three.ar'       => 'required' ,
            'answer_three.en'       => 'required' ,

            'value_answer_zero'       => 'required' ,
            'value_answer_one'       => 'required' ,
            'value_answer_two'       => 'required' ,
            'value_answer_three'       => 'required' ,
        ];
    }
}

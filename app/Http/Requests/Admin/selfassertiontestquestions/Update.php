<?php

namespace App\Http\Requests\Admin\selfassertiontestquestions;

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
            'always.ar'       => 'required' ,
            'always.en'       => 'required' ,
            'mostly.ar'       => 'required' ,
            'mostly.en'       => 'required' ,
            'sometimes.ar'       => 'required' ,
            'sometimes.en'       => 'required' ,
            'scarcely.ar'       => 'required' ,
            'scarcely.en'       => 'required' ,
            'never.ar'       => 'required' ,
            'never.en'       => 'required' ,
            'value_always'       => 'required' ,
            'value_mostly'       => 'required' ,
            'value_sometimes'       => 'required' ,
            'value_scarcely'       => 'required' ,
            'value_never'       => 'required' ,
        ];
    }
}

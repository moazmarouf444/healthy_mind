<?php

namespace App\Http\Requests\Admin\questions;

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
            'test_id' => 'required|exists:tests,id',
            'question.ar' => 'required',
            'question.en' => 'required',
            'answer_zero.ar' => 'required',
            'answer_zero.en' => 'required',
            'answer_one.ar' => 'required',
            'answer_one.en' => 'required',
            'answer_two.ar' => 'required',
            'answer_two.en' => 'required',
            'answer_three.ar' => 'required',
            'answer_three.en' => 'required',
        ];
    }
}

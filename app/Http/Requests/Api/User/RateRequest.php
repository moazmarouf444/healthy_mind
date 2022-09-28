<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class RateRequest extends BaseApiRequest
{

    public function rules()
    {
        return [
            'doctor_id'   => 'required|exists:doctors,id',
            'rate'          => 'required|in:1,2,3,4,5',
            'comment'          => 'nullable',
        ];
    }
}

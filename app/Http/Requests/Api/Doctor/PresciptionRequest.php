<?php

namespace App\Http\Requests\Api\Doctor;

use App\Http\Requests\Api\BaseApiRequest;

class PresciptionRequest extends BaseApiRequest
{

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'date'        => 'required|date',
            'diagnosis'        => 'required',
            'prescription'        => 'required',
        ];
    }
}

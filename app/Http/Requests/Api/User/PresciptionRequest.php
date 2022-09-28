<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\BaseApiRequest;

class PresciptionRequest extends BaseApiRequest
{

    public function rules()
    {
        return [
            'id' => 'required|exists:prescriptions,id',
        ];
    }
}

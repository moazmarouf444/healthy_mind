<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class Prescription extends BaseApiRequest
{

    public function rules()
    {
        return [
            'user_id'   => 'required|exists:users,id',
        ];
    }
}

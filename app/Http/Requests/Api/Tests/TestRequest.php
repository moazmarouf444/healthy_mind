<?php

namespace App\Http\Requests\Api\Tests;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends BaseApiRequest
{

    public function rules()
    {
        return [
            'count' => 'required|numeric',
            'user_id'     => 'required|exists:users,id',
        ];
    }
}

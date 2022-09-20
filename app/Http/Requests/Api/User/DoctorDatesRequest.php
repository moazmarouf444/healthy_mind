<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class DoctorDatesRequest extends BaseApiRequest
{

    public function rules()
    {
        return [
            'doctor_id'   => 'required|exists:doctors,id',
        ];
    }
}

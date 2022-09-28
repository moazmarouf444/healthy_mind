<?php

namespace App\Http\Requests\Api\Reservation;

use App\Http\Requests\Api\BaseApiRequest;

class StoreReservationRequest extends BaseApiRequest
{

    public function rules()
    {
        return [
            'doctor_id' => 'required|exists:doctors,id',
            'date'        => 'required|date|after:'.date('Y-m-d'),
            'start_time' => 'required',
            'end_time' => 'required',
            'reservation_type' => 'required|in:presence,remote',
        ];
    }
}

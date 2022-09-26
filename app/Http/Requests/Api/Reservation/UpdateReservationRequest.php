<?php

namespace App\Http\Requests\Api\Reservation;

use App\Http\Requests\Api\BaseApiRequest;
use App\Http\Requests\Api\Reservation;

class UpdateReservationRequest extends BaseApiRequest
{
    public function rules()
    {
        return [
            'doctor_id' => 'required|exists:doctors,id',
            'reservation_id' => 'required|exists:reservations,id',
            'date'        => 'required|date|after:'.date('Y-m-d'),
            'start_time' => 'required',
            'end_time' => 'required',
        ];
    }
}

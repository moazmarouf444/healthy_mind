<?php

namespace App\Http\Requests\Api\Reservation;

use App\Http\Requests\Api\BaseApiRequest;
use App\Http\Requests\Api\Reservation;

class DeleteReservationRequest extends BaseApiRequest
{
    public function rules()
    {
        return [
            'reservation_id' => 'required|exists:reservations,id',
        ];
    }
}

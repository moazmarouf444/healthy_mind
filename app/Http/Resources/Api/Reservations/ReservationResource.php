<?php

namespace App\Http\Resources\Api\Reservations;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'doctor' => $this->doctor->name,
            'specialization' => $this->doctor->specialization,
            'date' => $this->date,
            'start_time' => $this->start_time,
        ];
    }
}

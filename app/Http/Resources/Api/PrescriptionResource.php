<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'name' => $this->user->name,
            'doctor_name' => $this->doctor->name,
            'diagnosis' => $this->diagnosis,
            'prescription' => $this->prescription,
        ];
    }
}

<?php

namespace App\Http\Resources\Api\Doctor;

use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'user_name' => $this->user->name,
            'rate' => $this->rate ,
            'comment' => $this->comment ?? '' ,
        ];
    }
}

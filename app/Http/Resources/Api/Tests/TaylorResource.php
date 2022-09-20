<?php

namespace App\Http\Resources\Api\Tests;

use Illuminate\Http\Resources\Json\JsonResource;

class TaylorResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'biography' => $this->biography,
            'questions' => TaylorQuestionResource::collection($this->taylorTestQuestion),
        ];
    }
}

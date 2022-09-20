<?php

namespace App\Http\Resources\Api\Tests;

use App\Http\Resources\Api\Tests\SelfAssertionQuestionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SelfAssertionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'biography' => $this->biography,
            'questions' => SelfAssertionQuestionResource::collection($this->selfAssertionTestQuestion),
        ];
    }
}

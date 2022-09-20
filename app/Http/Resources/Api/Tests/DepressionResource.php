<?php

namespace App\Http\Resources\Api\Tests;

use App\Models\DepressionTestQuestion;
use Illuminate\Http\Resources\Json\JsonResource;

class DepressionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'biography' => $this->biography,
            'questions'                              => DepressionTestQuestionResource::collection($this->depressionTestQuestions),
        ];
    }
}

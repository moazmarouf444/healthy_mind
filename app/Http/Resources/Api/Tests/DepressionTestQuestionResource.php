<?php

namespace App\Http\Resources\Api\Tests;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DepressionTestQuestionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'question'       => $this->question,
            'answer_zero' => $this->answer_zero,
            'answer_one' => $this->answer_one,
            'answer_two' => $this->answer_two,
            'answer_three' => $this->answer_three,
            'value_answer_zero' => $this->value_answer_zero,
            'value_answer_one' => $this->value_answer_one,
            'value_answer_two' => $this->value_answer_two,
            'value_answer_three' => $this->value_answer_three,
        ];
    }
}

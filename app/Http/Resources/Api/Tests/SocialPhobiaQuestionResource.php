<?php

namespace App\Http\Resources\Api\Tests;

use Illuminate\Http\Resources\Json\JsonResource;

class SocialPhobiaQuestionResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'question' => $this->question,
            'yes' => $this->yes,
            'no' => $this->no,
            'value_yes' => $this->value_yes,
            'value_no' => $this->value_no,
        ];
    }
}

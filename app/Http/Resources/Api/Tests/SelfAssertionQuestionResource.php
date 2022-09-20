<?php

namespace App\Http\Resources\Api\Tests;

use Illuminate\Http\Resources\Json\JsonResource;

class SelfAssertionQuestionResource extends JsonResource
{

    public function toArray($request)
    {
        if(is_null($this->sort)){

        return [
            'id' => $this->id,
            'question'       => $this->question,
            'always' => $this->always,
            'mostly' => $this->mostly,
            'sometimes' => $this->sometimes,
            'scarcely' => $this->scarcely,
            'never' => $this->never,
            'value_always' => $this->value_always,
            'value_mostly' => $this->value_mostly,
            'value_sometimes' => $this->value_sometimes,
            'value_scarcely' => $this->value_scarcely,
            'value_never' => $this->value_never,
        ];
    }
    }

}

<?php

namespace App\Http\Resources\Api\Sections;

use Illuminate\Http\Resources\Json\JsonResource;

class IntroductionsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'image'       => $this->image,
        ];
    }
}

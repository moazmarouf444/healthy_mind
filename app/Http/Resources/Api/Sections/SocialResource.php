<?php

namespace App\Http\Resources\Api\Sections;

use Illuminate\Http\Resources\Json\JsonResource;

class SocialResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'link' => $this->link ,
            'name' => $this->name ,
            'image' => $this->image ,
        ];
    }
}

<?php

namespace App\Http\Resources\Api\Sections;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{

    private $token               = '';

    public function setToken($value) {
        $this->token = $value;
        return $this;
    }
    public function toArray($request) {
        return [
            'id'                  => $this->id,
            'name'                => $this->name,
            'image'                => $this->image,
            'email'               => $this->email,
            'active'               => $this->active,
            'is_blocked'               => $this->is_blocked,
            'is_approved'               => $this->is_approved,
            'country_code'        => $this->country_code,
            'phone'               => $this->phone,
            'full_phone'          => $this->full_phone,
            'logo_image'               => $this->logo,
            'lighted_image'               => $this->lighted,
            'specialization'               => $this->specialization,
            'biography'               => $this->biography,
            'lang'                => $this->lang,
            'is_notify'           => $this->is_notify,
            'token'               => $this->token,
        ];
    }
}
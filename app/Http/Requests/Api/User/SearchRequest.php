<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\BaseApiRequest;
class SearchRequest extends BaseApiRequest
{
    public function rules() {
        return [
            'name' => 'required',
        ];
    }
}

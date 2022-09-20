<?php

namespace App\Http\Requests\Api\Section;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends BaseApiRequest
{

    public function rules()
    {
        return [
            'id' => 'required|exists:articles,id'
        ];
    }
}

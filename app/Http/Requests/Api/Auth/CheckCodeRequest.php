<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CheckCodeRequest extends BaseApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function __construct(Request $request) {
        $request['phone']        = fixPhone($request['phone']);
        $request['country_code'] = fixPhone($request['country_code']);
    }

    public function rules() {
        return [
            'code'         => 'required|max:10',
            'country_code' => 'required|exists:users,country_code',
            'phone'        => 'required|exists:users,phone',
            'password'     => 'required|min:6|max:100',
        ];
    }

}

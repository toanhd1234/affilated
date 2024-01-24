<?php

namespace Modules\Auth\src\Http\Requests;

use App\Http\Requests\BaseRequest;

class RefreshTokenRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'refresh_token' => [
                'required',
            ],
        ];
    }
}

<?php

namespace Modules\Profile\src\Http\Requests;

use App\Http\Requests\BaseRequest;

class UpdateProfileRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:rfc,dns',
            ],
            'password' => [
                'required',
                'regex:/^[^\s\x{3000}\x{FF01}-\x{FF5E}\p{Han}](?:[^\s\x{3000}\x{FF01}-\x{FF5E}\p{Han}]*[^\s\x{3000}\x{FF01}-\x{FF5E}\p{Han}])?$/u',
            ],
        ];
    }
}

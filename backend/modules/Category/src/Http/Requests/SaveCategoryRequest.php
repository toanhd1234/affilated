<?php

namespace Modules\Category\src\Http\Requests;

use App\Http\Requests\BaseRequest;

class SaveCategoryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:255',
            ],
        ];
    }
}

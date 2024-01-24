<?php

namespace Modules\Profile\src\Services;

use App\Http\Services\BaseService;
use Auth;
use Illuminate\Http\JsonResponse;

/**
 * @property \Illuminate\Database\Eloquent\Model $model
 * @property array $models
 * @property array $request
 */
class UpdateProfileService extends BaseService
{
    /**
     * Main function of service
     */
    public function handle(): JsonResponse
    {
        dd($this->request);

        return $this->responseSuccess([
            'data' => Auth::guard('api')->user(),
        ]);
    }

}

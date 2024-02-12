<?php

namespace Modules\Profile\src\Services;

use App\Http\Services\BaseService;
use Auth;
use Illuminate\Http\JsonResponse;

/**
 * @property array $request
 */
class GetProfileService extends BaseService
{
    /**
     * Main function of service
     */
    public function handle(): JsonResponse
    {
        return $this->responseSuccess([
            'data' => Auth::guard('api')->user(),
        ]);
    }

}

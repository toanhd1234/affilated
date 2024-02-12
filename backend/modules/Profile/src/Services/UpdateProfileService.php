<?php

namespace Modules\Profile\src\Services;

use App\Http\Services\BaseService;
use Auth;
use Illuminate\Http\JsonResponse;

/**
 * @property array $request
 */
class UpdateProfileService extends BaseService
{
    /**
     * Main function of service
     */
    public function handle(): JsonResponse
    {
        $result = Auth::guard('api')->user();
        //update

        return $this->responseSuccess([
            'data' => $result
        ]);
    }

}

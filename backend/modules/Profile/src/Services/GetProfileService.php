<?php

namespace Modules\Profile\src\Services;

use App\Http\Services\BaseService;
use Auth;
use Illuminate\Http\JsonResponse;
use Modules\Auth\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * @property \Illuminate\Database\Eloquent\Model $model
 * @property array $models
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
            'data' => Auth::user(),
        ]);
    }

}

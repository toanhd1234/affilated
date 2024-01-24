<?php

namespace Modules\Auth\src\Services;

use App\Http\Services\BaseService;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * @property \Illuminate\Database\Eloquent\Model $model
 * @property array $models
 * @property array $request
 */
class RefreshTokenService extends BaseService
{
    /**
     * Main function of service
     */
    public function handle(): JsonResponse
    {
        $refreshToken = JWTAuth::getJWTProvider()->decode($this->request['refresh_token']);
        // check expired token
        // handle login refresh
        // check refresh token has user id exists in database

        return $this->responseSuccess([
            'refresh_token' => $refreshToken,
            'token_type' => 'bearer',
        ]);

        // return $this->responseErrors(__('message.ERR_002'), JsonResponse::HTTP_BAD_REQUEST);
    }
}

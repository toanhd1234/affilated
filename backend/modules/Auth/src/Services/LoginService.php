<?php

namespace Modules\Auth\src\Services;

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
class LoginService extends BaseService
{
    public function __construct()
    {
        $this->setModel(User::class);
    }

    /**
     * Main function of service
     */
    public function handle(): JsonResponse
    {
        if ($token = Auth::guard('api')->attempt($this->request, true)) {

            $dataRefreshToken = [
                'random' => rand() . time(),
                'expired_at' => time() . config('jwt.refresh_ttl')
            ];

            $refreshToken = JWTAuth::getJWTProvider()->encode($dataRefreshToken);

            return $this->responseSuccess([
                'access_token' => $token,
                'refresh_token' => $refreshToken,
                'token_type' => 'bearer',
                'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
            ]);
        }

        return $this->responseErrors(__('message.ERR_001'), JsonResponse::HTTP_UNAUTHORIZED);
    }
}

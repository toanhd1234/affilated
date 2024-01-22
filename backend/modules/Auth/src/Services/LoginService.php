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
        if ($token = JWTAuth::attempt($this->request, true)) {
            return $this->responseSuccess([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'data' => Auth::user(),
            ]);
        }

        return $this->responseErrors(__('message.ERR_001'), JsonResponse::HTTP_UNAUTHORIZED);
    }
}

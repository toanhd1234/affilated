<?php

namespace Modules\Auth\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Auth\src\Http\Requests\LoginRequest;
use Modules\Auth\src\Http\Requests\RefreshTokenRequest;
use Modules\Auth\src\Services\LoginService;
use Modules\Auth\src\Services\RefreshTokenService;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        return resolve(LoginService::class)->setRequest($request->validated())->handle();
    }

    public function refreshToken(RefreshTokenRequest $request): JsonResponse
    {
        return resolve(RefreshTokenService::class)->setRequest($request->validated())->handle();
    }
}

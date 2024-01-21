<?php

namespace Modules\Auth\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Auth\src\Http\Requests\LoginRequest;
use Modules\Auth\src\Services\LoginService;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        return resolve(LoginService::class)->setRequest($request->validated())->handle();
    }
}

<?php

namespace Modules\Profile\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Profile\src\Http\Requests\UpdateProfileRequest;
use Modules\Profile\src\Services\GetProfileService;
use Modules\Profile\src\Services\UpdateProfileService;

class ProfileController extends Controller
{
    public function getProfile(): JsonResponse
    {
        return resolve(GetProfileService::class)->handle();
    }

    public function updateProfile(UpdateProfileRequest $request): JsonResponse
    {
        return resolve(UpdateProfileService::class)->setRequest($request->validated())->handle();
    }
}

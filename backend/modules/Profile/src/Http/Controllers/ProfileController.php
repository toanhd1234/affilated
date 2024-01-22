<?php

namespace Modules\Profile\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Profile\src\Services\GetProfileService;

class ProfileController extends Controller
{
    public function getProfile(): JsonResponse
    {
        return resolve(GetProfileService::class)->handle();
    }
}

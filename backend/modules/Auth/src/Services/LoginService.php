<?php

namespace Modules\Auth\src\Services;

use App\Http\Services\BaseService;
use Illuminate\Http\JsonResponse;

class LoginService extends BaseService
{
    public function handle(): JsonResponse
    {
       return $this->responseSuccess(['success' => true]);
    }
}

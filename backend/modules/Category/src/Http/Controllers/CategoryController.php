<?php

namespace Modules\Category\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Category\src\Http\Requests\SaveCategoryRequest;
use Modules\Category\src\Services\CreateCategoryService;
use Modules\Category\src\Services\GetCategoriesService;
use Modules\Category\src\Services\GetCategoryByIdService;
use Modules\Category\src\Services\UpdateCategoryService;

class CategoryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return resolve(GetCategoriesService::class)->setRequest($request->only(['keyword']))->handle();
    }

    public function store(SaveCategoryRequest $request): JsonResponse
    {
        return resolve(CreateCategoryService::class)->setRequest($request->validated())->handle();
    }

    public function update(int $id, SaveCategoryRequest $request): JsonResponse
    {
        return resolve(UpdateCategoryService::class)->setDataById($id)->setRequest($request->validated())->handle();
    }

    public function show(int $id): JsonResponse
    {
        return resolve(GetCategoryByIdService::class)->setDataById($id)->handle();
    }
}

<?php

namespace Modules\Category\src\Services;

use App\Http\Services\BaseService;
use Auth;
use Illuminate\Http\JsonResponse;
use Modules\Category\Models\Category;
use Modules\Category\src\Repositories\CategoryRepository;

/**
 * @property \Illuminate\Database\Eloquent\Model $model
 * @property array $models
 * @property array $request
 */
class CreateCategoryService extends BaseService
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Main function of service
     */
    public function handle(): JsonResponse
    {
        $result = $this->categoryRepository->create($this->request);

        return $this->responseSuccess([
            'data' => $result,
        ]);
    }
}

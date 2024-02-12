<?php

namespace Modules\Category\src\Services;

use App\Http\Services\BaseService;
use Illuminate\Http\JsonResponse;
use Modules\Category\src\Repositories\CategoryRepositoryInterface;

/**
 * @property array $request
 */
class CreateCategoryService extends BaseService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
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

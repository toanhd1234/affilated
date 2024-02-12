<?php

namespace Modules\Category\src\Services;

use App\Http\Interfaces\EditInterface;
use App\Http\Services\BaseService;
use Illuminate\Http\JsonResponse;
use Modules\Category\src\Repositories\CategoryRepository;

/**
 * @property \Illuminate\Database\Eloquent\Model $model
 * @property array $models
 * @property array $request
 */
class GetCategoryByIdService extends BaseService implements EditInterface
{
    protected $category;
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
        if (empty($this->category)) {
            return $this->responseErrors(__('message.ERR_003'), JsonResponse::HTTP_NOT_FOUND);
        }

        return $this->responseSuccess([
            'data' => $this->category,
        ]);
    }

    public function setDataById(int $id): self
    {
        $this->category = $this->categoryRepository->firstWhere(['id' => $id]);

        return $this;
    }
}

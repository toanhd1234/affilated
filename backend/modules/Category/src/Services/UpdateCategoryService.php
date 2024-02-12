<?php

namespace Modules\Category\src\Services;

use App\Http\Interfaces\EditInterface;
use App\Http\Services\BaseService;
use Illuminate\Http\JsonResponse;
use Modules\Category\src\Repositories\CategoryRepositoryInterface;

/**
 * @property array $request
 */
class UpdateCategoryService extends BaseService implements EditInterface
{
    protected $category;
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
        if (empty($this->category)) {
            return $this->responseErrors(__('message.ERR_003'), JsonResponse::HTTP_NOT_FOUND);
        }

        $result = tap($this->category)->update($this->request);

        return $this->responseSuccess([
            'data' => $result,
        ]);
    }

    public function setDataById(int $id): self
    {
        $this->category = $this->categoryRepository->firstWhere(['id' => $id]);

        return $this;
    }
}

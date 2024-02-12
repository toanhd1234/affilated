<?php

namespace Modules\Category\src\Services;

use App\Http\Services\BaseService;
use Illuminate\Http\JsonResponse;
use Modules\Category\src\Repositories\CategoryRepositoryInterface;

/**
 * @property array $request
 */
class GetCategoriesService extends BaseService
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
        $result = $this->categoryRepository
            ->scopeQuery(function ($query) {
                $query->select(['id', 'name', 'updated_at'])
                    ->when(isset($this->request['keyword']), function ($query) {
                        $query->where('name', 'LIKE', '%' . $this->request['keyword'] . '%');
                    })
                    ->orderBy('id', parent::ORDER_BY_DESC);
            })
            ->get();

        return $this->responseSuccess([
            'data' => $result,
        ]);
    }
}

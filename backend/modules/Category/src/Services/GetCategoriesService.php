<?php

namespace Modules\Category\src\Services;

use App\Http\Services\BaseService;
use Auth;
use Illuminate\Http\JsonResponse;
use Modules\Category\Models\Category;

/**
 * @property \Illuminate\Database\Eloquent\Model $model
 * @property array $models
 * @property array $request
 */
class GetCategoriesService extends BaseService
{

    public function __construct()
    {
        $this->setModel(Category::class);
    }

    /**
     * Main function of service
     */
    public function handle(): JsonResponse
    {
        $result = $this->model
            ->select(['id', 'name', 'updated_at'])
            ->when(isset($this->request['keyword']), function ($query) {
                $query->where('name', 'LIKE', '%' . $this->request['keyword'] . '%');
            })
            ->orderBy('id', parent::ORDER_BY_DESC)
            ->get();

        return $this->responseSuccess([
            'data' => $result,
        ]);
    }
}

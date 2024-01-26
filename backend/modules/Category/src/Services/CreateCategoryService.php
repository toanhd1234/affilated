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
class CreateCategoryService extends BaseService
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
        $result = $this->model->create($this->request);

        return $this->responseSuccess([
            'data' => $result,
        ]);
    }
}

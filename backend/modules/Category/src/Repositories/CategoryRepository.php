<?php

namespace Modules\Category\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Category\Models\Category;

/**
 * @property \Illuminate\Database\Eloquent\Model $model
 */
class CategoryRepository extends BaseRepository
{
    public function getModel(): string
    {
        return Category::class;
    }
}

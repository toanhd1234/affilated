<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Modules\Category\src\Repositories\CategoryRepository;
use Modules\Category\src\Repositories\CategoryRepositoryInterface;

class DependencyServiceProvider extends ServiceProvider
{
    /**
     * Register Service Provider
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Perform booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

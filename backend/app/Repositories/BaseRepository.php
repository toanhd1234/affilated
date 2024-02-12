<?php

namespace App\Repositories;

use Closure;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Foundation\Application;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    protected $app;
    protected $scopeQuery;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->resetModel();
    }

    abstract public function getModel(): string;

    public function find(int $id, array $columns = ['*']): Model|null
    {
        return $this->model->find($id, $columns);
    }

    public function scopeQuery(Closure $scope): self
    {
        $this->scopeQuery = $scope;

        return $this;
    }

    public function resetModel()
    {
        $instance = $this->app->make($this->getModel());

        if (!$instance instanceof Model) {
            dd('failed to reset model');
        }

        return $this->model = $instance;
    }

    public function firstWhere(array $where, array $columns = ['*']): Model|null
    {
        return $this->model->select($columns)->where($where)->first();
    }

    public function firstOrFailWhere(array $where, array $columns = ['*']): Model|null
    {
        return $this->model->firstOrFail($where, $columns);
    }

    public function all(array $columns = ['*']): Collection
    {
        return $this->model->get($columns);

    }

    public function paginate(int $limit = null, array $columns = ['*']): LengthAwarePaginator
    {
        return $this->model->paginate($limit, $columns);
    }

    public function simplePaginate(int $limit = null, array $columns = ['*']): Paginator
    {
        return $this->model->simplePaginate($limit, $columns);
    }

    public function findByField(array $where, array $columns = ['*']): Collection
    {
        return $this->model->where($where)->get($columns);
    }

    public function findWhereIn(array $where, array $columns = ['*']): Collection
    {
        return $this->model->whereIn($where)->get($columns);
    }

    public function create(array $request): Model
    {
        return $this->model->create($request);
    }

    public function update(int $id, array $request, array $where = []): Model|false
    {
        $result = $this->model->where($id)->where($where)->first();

        if (!$result) {
            return false;
        }

        return tap($result)->update($request);
    }

    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }

    public function insert(array $request): bool
    {
        return $this->model->insert($request);
    }
}
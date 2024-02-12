<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function find(int $id, array $columns = ['*']): Model|null;

    public function firstWhere(array $where, array $columns = ['*']): Model|null;

    public function firstOrFailWhere(array $where, array $columns = ['*']): Model|null;

    public function get(array $columns = ['*']): Collection;

    public function paginate(int $limit = null, array $columns = ['*']): LengthAwarePaginator;

    public function simplePaginate(int $limit = null, array $columns = ['*']): Paginator;

    public function findByField(array $where, array $columns = ['*']): Collection;

    public function findWhereIn(array $where, array $columns = ['*']): Collection;

    public function create(array $request): Model;

    public function update(int $id, array $request, array $where = []): Model|false;

    public function delete(int $id): bool;

    public function insert(array $request): bool;
}

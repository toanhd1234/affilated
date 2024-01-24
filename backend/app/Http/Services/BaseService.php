<?php

namespace App\Http\Services;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

abstract class BaseService
{
    protected $request;
    protected $model;
    protected $models = [];

    public function setRequest(array $request): self
    {
        $this->request = $request;

        return $this;
    }

    public function setModel(string $model): self
    {
        $this->model = app($model);

        return $this;
    }

    public function setMultipleModel(string ...$models): self
    {
        $this->models = app($models);

        return $this;
    }

    public function responseErrors(string $message = '', int $statusCode = 400): JsonResponse
    {
        return response()->json(['code' => $statusCode, 'message' => $message], $statusCode);
    }

    public function responseSuccess(array $data, int $statusCode = 200): JsonResponse
    {
        return response()->json(['code' => $statusCode, 'data' => $data], $statusCode);
    }

    abstract public function handle(): JsonResponse;
}

<?php

namespace App\Http\Services;

use Illuminate\Http\JsonResponse;

abstract class BaseService
{
    const ORDER_BY_DESC = 'DESC';
    const ORDER_BY_ASC = 'ASC';

    protected $request;
    protected $model;
    protected $models = [];

    public function setRequest(array $request): self
    {
        $this->request = $request;

        return $this;
    }

    public function responseErrors(string $message = '', int $statusCode = 400): JsonResponse
    {
        return response()->json(['code' => $statusCode, 'message' => $message], $statusCode);
    }

    public function responseSuccess(array $data, int $statusCode = 200): JsonResponse
    {
        return response()->json(array_merge(['code' => $statusCode], $data), $statusCode);
    }

    abstract public function handle(): JsonResponse;
}

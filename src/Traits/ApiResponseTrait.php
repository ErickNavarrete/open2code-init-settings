<?php

namespace OpenToCode\InitSettings\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    /**
     * @param $data
     * @param $code
     *
     * @return JsonResponse
     */
    protected function successResponse($data, $code): JsonResponse
    {
        return response()->json($data, $code);
    }

    /**
     * @param $message
     * @param $code
     *
     * @return JsonResponse
     */
    protected function errorResponse($message, $code): JsonResponse
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * @param Collection $collection
     * @param int        $code
     *
     * @return JsonResponse
     */
    protected function showAll(Collection $collection, int $code = 200): JsonResponse
    {
        if ($collection->isEmpty()) {
            return $this->successResponse($collection, $code);
        }

        return $this->successResponse($collection->values(), $code);
    }

    /**
     * @param Model $instance
     * @param int   $code
     *
     * @return JsonResponse
     */
    protected function showOne(Model $instance, int $code = 200): JsonResponse
    {
        return $this->successResponse($instance, $code);
    }

    /**
     * @param     $message
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function showMessage($message, int $code = 200): JsonResponse
    {
        return $this->successResponse(['message' => $message], $code);
    }

    /**
     * @param     $instance
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function showList($instance, int $code = 200): JsonResponse
    {
        return $this->successResponse($instance, $code);
    }
}
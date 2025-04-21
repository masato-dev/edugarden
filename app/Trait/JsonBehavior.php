<?php

namespace App\Trait;

use Illuminate\Http\JsonResponse;

trait JsonBehavior
{
    public function success(?string $message = null, $data = null, int $status = 200, array $customData = []): JsonResponse
    {
        return response()->json(array_merge($customData, [
            'status' => true,
            'status_code' => $status,
            'message' => $message,
            'data' => $data,
        ]), $status);
    }

    public function error(?string $message = null, int $status = 500, $errors = null): JsonResponse
    {
        return response()->json([
            'status' => false,
            'status_code' => $status,
            'message' => $message,
            'errors' => $errors,
        ], $status);
    }

    public function notFound(string $message = 'Not Found!!!', int $status = 404, $errors = null): JsonResponse {
        return $this->error($message, $status, $errors);
    }
}

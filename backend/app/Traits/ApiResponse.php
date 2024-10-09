<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * success response
     */
    public function successResponse(mixed $data = NULL, string $successMessage = 'Success', int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'successMessage' => $successMessage,
            'statusCode' => $statusCode,
            'data' => $data
        ]);
    }

    /**
     * error response
     */
    public function errorResponse(mixed $data = NULL, string $errorMessage = 'Error', int $statusCode = 500): JsonResponse
    {
        return response()->json([
            'errorMessage' => $errorMessage,
            'statusCode' => $statusCode,
            'data' => $data
        ]);
    }
}

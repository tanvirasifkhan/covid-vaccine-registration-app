<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthLogoutRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class AuthLogoutController extends Controller
{
    use ApiResponse;

    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthLogoutRequest $authLogoutRequest): JsonResponse
    {
        $authLogoutRequest->user()->currentAccessToken()->delete();

        return $this->successResponse(
            successMessage: 'Loggedout successfully',
            statusCode: 200
        );
    }
}

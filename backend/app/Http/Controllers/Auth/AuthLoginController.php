<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Repositories\AuthRepository;
use App\Traits\ApiResponse;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class AuthLoginController extends Controller
{
    use ApiResponse;

    private $auth;

    public function __construct(AuthRepository $authRepository)
    {
        $this->auth = $authRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthLoginRequest $authLoginRequest): JsonResponse
    {
        $authLoginRequest->validated();

        if($this->auth->isLoggedIn($authLoginRequest->email, $authLoginRequest->password))
        {
            $user = $authLoginRequest->user();

            $token = $user->createToken('token')->plainTextToken;

            $user->token = $token;

            return $this->successResponse(
                successMessage: 'Loggedin successfully',
                statusCode: 200,
                data: new UserResource($user)
            );
        }else {
            return $this->errorResponse(
                errorMessage: 'Wrong credentials! Login failed',
                statusCode: 401
            );
        }
    }
}

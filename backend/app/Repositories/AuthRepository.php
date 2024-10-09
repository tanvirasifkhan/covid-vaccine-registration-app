<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    /**
     * check whether the user is loggedin or not
     */
    public function isLoggedIn(string $email, string $password): bool
    {
        return Auth::attempt(['email' => $email, 'password' => $password]);
    }
}

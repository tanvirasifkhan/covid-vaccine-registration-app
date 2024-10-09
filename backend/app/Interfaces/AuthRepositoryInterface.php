<?php

namespace App\Interfaces;

interface AuthRepositoryInterface
{
    public function isLoggedIn(string $email, string $password): bool;
}

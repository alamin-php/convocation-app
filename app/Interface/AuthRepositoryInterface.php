<?php

namespace App\Interface;

use App\Models\User;

interface AuthRepositoryInterface
{
    public function attemptLogin(array $credentials): ?string;
    public function logout(User $user): bool;
}

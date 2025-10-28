<?php

namespace App\Repositories;

use App\Interface\AuthRepositoryInterface;
use App\Models\User;
use Auth;

class EloquentAuthRepository implements AuthRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function attemptLogin(array $credentials): string|null{
        if(!Auth::attempt($credentials)){
            return null;
        }

        $user = Auth::user();

        $token = $user->createToken('auth_token')->plainTextToken;
        return $token;
    }

    public function logout(User $user): bool{
        $user->tokens()->delete();
        return true;
    }
}

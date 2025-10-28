<?php

namespace App\Services;

use App\Interface\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class AuthService
{
    /**
     * Create a new class instance.
     */
    protected AuthRepositoryInterface $authRepository;
    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }


    public function login(array $credentials): ?string
    {
        $cacheKey = 'login_' . md5(json_encode($credentials));
        return Cache::remember($cacheKey, 10, function () use ($credentials) {
            return $this->authRepository->attemptLogin($credentials);
        });
    }

    public function logout(User $user): bool
    {
        Cache::flush();
        return $this->authRepository->logout($user);
    }
}

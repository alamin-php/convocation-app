<?php

namespace App\Providers;

use App\Interface\AuthRepositoryInterface;
use App\Interface\GuestRepositoryInterface;
use App\Repositories\AbsentGuestRepository;
use App\Repositories\AttendendGuestRepository;
use App\Repositories\BaseGuestRepository;
use App\Repositories\EloquentAuthRepository;
use App\Repositories\EloquentGuestRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, EloquentAuthRepository::class);
        $this->app->bind(GuestRepositoryInterface::class, EloquentGuestRepository::class);
        // Bind filter repositories to interface keys
        $this->app->bind('filter.attended', AttendendGuestRepository::class);
        $this->app->bind('filter.absent', AbsentGuestRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

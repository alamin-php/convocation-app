<?php

namespace App\Services;

use App\Interface\GuestFilterInterface;
use App\Repositories\BaseGuestRepository;

class GuestFilterService
{
    /**
     * Create a new class instance.
     */
    protected GuestFilterInterface $repository;
    public function __construct(GuestFilterInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getFilteredGuest()
    {
        return $this->repository->filter();
    }
}

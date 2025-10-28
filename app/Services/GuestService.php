<?php

namespace App\Services;

use App\Interface\GuestRepositoryInterface;

class GuestService
{
    /**
     * Create a new class instance.
     */
    protected $guestRepo;
    public function __construct(GuestRepositoryInterface $guestRepo)
    {
        $this->guestRepo = $guestRepo;
    }

    public function getGuests()
    {
        return $this->guestRepo->getAll();
    }

    public function searchGuests(string $query)
    {
        return $this->guestRepo->search($query);
    }

    public function createGuest(array $data)
    {
        return $this->guestRepo->store($data);
    }

    public function markAttendance($id)
    {
        return $this->guestRepo->markAttendance($id);
    }
}

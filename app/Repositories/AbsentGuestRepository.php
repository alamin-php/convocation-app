<?php

namespace App\Repositories;

use App\Interface\GuestFilterInterface;
use App\Models\Guest;
use Illuminate\Support\Collection;

class AbsentGuestRepository implements GuestFilterInterface
{
    public function filter(): Collection
    {
        return Guest::whereNull('attended_at')
            ->orderBy('name')
            ->get();
    }
}

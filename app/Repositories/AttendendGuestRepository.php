<?php

namespace App\Repositories;

use App\Interface\GuestFilterInterface;
use App\Models\Guest;
use Illuminate\Support\Collection;

class AttendendGuestRepository implements GuestFilterInterface
{
    public function filter(): Collection
    {
        return Guest::whereNotNull('attended_at')
            ->orderByDesc('attended_at')
            ->get();
    }

}

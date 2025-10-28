<?php

namespace App\Repositories;

use App\Interface\GuestRepositoryInterface;
use App\Models\Guest;

class EloquentGuestRepository implements GuestRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getAll()
    {
        return Guest::latest()->get();
    }

    public function search(string $query)
    {
        return Guest::where('name', 'like', "%{$query}%")
            ->orWhere('phone', 'like', "%{$query}%")->get();
    }

    public function findByPhone(string $phone)
    {
        return Guest::where('phone', $phone)->first();
    }

    public function store(array $data)
    {
        return Guest::create($data);
    }

    public function markAttendance(int $id)
    {
        $guest = Guest::findOrFail($id);
        $guest->attended_at = now();
        $guest->save();
        return $guest;
    }

}

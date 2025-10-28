<?php

namespace App\Interface;

interface GuestRepositoryInterface
{
    public function getAll();
    public function search (string $query);
    public function findByPhone(string $phone);
    public function store(array $data);
    public function markAttendance(int $id);
}

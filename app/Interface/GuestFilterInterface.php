<?php

namespace App\Interface;
use Illuminate\Support\Collection;

interface GuestFilterInterface
{
    public function filter():Collection;
}

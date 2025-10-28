<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GuestResource;
use App\Repositories\AbsentGuestRepository;
use App\Repositories\AttendendGuestRepository;
use App\Services\GuestFilterService;
use Illuminate\Http\Request;

class GuestFilterController extends Controller
{

    public function attended()
    {
        $service = new GuestFilterService(app('filter.attended'));
        $guests = $service->getFilteredGuest();
        return GuestResource::collection($guests);
    }

    public function absent()
    {
        $service = new GuestFilterService(app('filter.absent'));
        $guest = $service->getFilteredGuest();
        return GuestResource::collection($guest);
    }
}

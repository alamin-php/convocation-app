<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuestStoreRequest;
use App\Http\Resources\GuestResource;
use App\Services\GuestService;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    protected $guestService;
    public function __construct(GuestService $guestService)
    {
        $this->guestService = $guestService;
    }

    public function index(){
        return GuestResource::collection($this->guestService->getGuests());
    }

    public function search(Request $request){
        $query = $request->input('query','');
        $results = $this->guestService->searchGuests($query);
        return GuestResource::collection($results);
    }

    public function store(GuestStoreRequest $request){
                $guest = $this->guestService->createGuest($request->validated());
        return new GuestResource($guest);
    }

    public function markAttendance($id){
        $guest = $this->guestService->markAttendance($id);
        return new GuestResource($guest);
    }
}

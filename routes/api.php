<?php

use App\Http\Controllers\Api\GuestController;
use App\Http\Controllers\Api\GuestFilterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('guests')->group(function () {
    Route::get('/', [GuestController::class, 'index']);
    Route::get('/search', [GuestController::class, 'search']);
    Route::post('/', [GuestController::class, 'store']);
    Route::post('/{id}/attendance', [GuestController::class, 'markAttendance']);
     Route::get('/attended', [GuestFilterController::class, 'attended']);
     Route::get('/absent', [GuestFilterController::class, 'absent']);
});

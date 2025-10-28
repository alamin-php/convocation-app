<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
     use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'invitation_code',
        'attended_at',
    ];

    protected $casts = [
        'attended_at' => 'datetime',
    ];

    // Helper function for attendance status
    public function getIsAttendedAttribute(): bool
    {
        return !is_null($this->attended_at);
    }
}

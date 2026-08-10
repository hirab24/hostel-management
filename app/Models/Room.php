<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resident;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'floor',
        'capacity',
        'available_beds',
        'monthly_rent',
        'status',
    ];

    public function residents()
{
    return $this->hasMany(Resident::class);
}
}
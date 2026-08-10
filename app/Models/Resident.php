<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\Payment;
use App\Models\Complaint;

class Resident extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'cnic',
        'guardian_name',
        'guardian_phone',
        'room_id',
        'check_in_date',
        'monthly_fee',
        'status',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function payments()
{
    return $this->hasMany(Payment::class);
}
public function complaints()
{
    return $this->hasMany(Complaint::class);
}
}
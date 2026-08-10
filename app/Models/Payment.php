<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'resident_id',
        'amount',
        'month',
        'payment_date',
        'payment_method',
        'status',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
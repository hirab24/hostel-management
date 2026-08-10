<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resident;

class Complaint extends Model
{
    protected $fillable = [
        'resident_id',
        'subject',
        'description',
        'priority',
        'status',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
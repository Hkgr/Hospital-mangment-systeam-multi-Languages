<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbulanceCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'call_time',
        'ambulance_id',
        'address',
        'details',
        'status',
    ];

    public function ambulance()
    {
        return $this->belongsTo(Ambulance::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'vehicle_id', 'zone_id', 'entry_time', 'exit_time', 'total_price'];

    protected $casts = [
        'entry_time' => 'datetime',
        'exit_time' => 'datetime',
    ];
}

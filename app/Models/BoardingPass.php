<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BoardingPass extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'boarding_pass';

    protected $fillable = [
        'passenger_id',
        'flight_id',
        'seat_number',
        'gate',
        'boarding_time',
        'departure_time',
        'class',
        'status',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Flight extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'flights';

    protected $fillable = [
        'airline_id',
        'flight_number',
        'departure_airport',
        'arrival_airport',
        'departure_time',
        'arrival_time',
        'status',
    ];

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function passengers()
    {
        return $this->belongsToMany(Passenger::class, 'flight_passenger');
    }

    public function flightNumber()
    {
        return $this->airline->iata . $this->flight_number;
    }

    public function arrivalAirport()
    {
        return $this->belongsTo(Airport::class, 'arrival_airport');
    }

    public function departureAirport()
    {
        return $this->belongsTo(Airport::class, 'departure_airport');
    }

}

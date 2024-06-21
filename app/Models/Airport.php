<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Airport extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'airports';

    protected $fillable = [
        'name',
        'city',
        'country',
        'iata',
        'icao',
        'latitude',
        'longitude',
        'altitude',
        'timezone',
        'dst',
        'tz_database_time_zone',
        'type',
        'source',
        'active'
    ];

    public function checkInCounters()
    {
        return $this->hasMany(CheckInCounter::class);
    }

    public function flightsDeparting()
    {
        return $this->hasMany(Flight::class, 'departure_airport');
    }

    public function flightsArriving()
    {
        return $this->hasMany(Flight::class, 'arrival_airport');
    }
}

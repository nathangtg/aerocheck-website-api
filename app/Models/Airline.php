<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Airline extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'airlines';

    protected $fillable = [
        'name',
        'icao',
        'iata',
        'callsign',
        'country',
        'active',
    ];

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}

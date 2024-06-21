<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Baggage extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'baggage';

    protected $fillable = [
        'passenger_id',
        'flight_id',
        'tag_number',
        'weight',
        'status',
    ];

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function tagNumber()
    {
        return $this->tag_number;
    }

    public function getFormattedWeight(): string
    {
        return $this->weight . ' lbs';
    }
}

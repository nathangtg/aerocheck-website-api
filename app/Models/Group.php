<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = [
        'leader_id',
        'passenger_id',
        'flight_id',
    ];

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}

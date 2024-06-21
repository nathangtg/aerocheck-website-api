<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CheckInCounter extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'check_in_counters';

    protected $fillable = [
        'airport_id',
        'staff_id',
        'flight_id',
        'counter_number',
    ];

    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}

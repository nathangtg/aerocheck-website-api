<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelfService extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'self_service';

    protected $fillable = [
        'airport_id',
        'passenger_id',
        'flight_id',
        'status',
    ];

    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function getActiveStatus(): string
    {
        return $this->active ? 'Active' : 'Inactive';
    }
}

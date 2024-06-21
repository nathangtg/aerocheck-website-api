<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Passenger extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'passengers';

    protected $fillable = [
        'user_id',
        'check_in_code',
        'phone',
        'flight_id',
        'special_needs',
        'special_needs_description',
        'is_checked_in',
        'group_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flights()
    {
        return $this->belongsToMany(Flight::class, 'flight_passenger');
    }

    public function getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}

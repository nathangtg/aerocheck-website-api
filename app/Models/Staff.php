<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Staff extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'staff';

    protected $fillable = [
        'user_id',
        'position',
        'salary',
        'hire_date',
        'fire_date',
        'active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}

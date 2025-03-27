<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    protected $fillable = [
        'movie_id',
        'show_date',
        'show_time'
    ];

    public function movie() {
        return $this->belongsTo(Movie::class);
    }
    
    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    //
    public function movie() {
        return $this->belongsTo(Movie::class);
    }
    
    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}

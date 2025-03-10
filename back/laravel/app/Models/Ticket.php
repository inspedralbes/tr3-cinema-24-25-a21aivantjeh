<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    public function reservation() {
        return $this->belongsTo(Reservation::class);
    }
    
    public function seat() {
        return $this->belongsTo(Seat::class);
    }
}

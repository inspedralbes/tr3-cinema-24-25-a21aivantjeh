<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    protected $fillable = [
        'user_id',
        'user_email',
        'showtime_id',
        'fila',
        'columna',
        'ticket_id',
    ];
}

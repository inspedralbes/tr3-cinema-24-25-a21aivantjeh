<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'genre',
        'year',
        'rating',
        'duration',
        'director',
        'writer',
        'cast',
        'rated',
        'language',
        'release_date',
        'poster',
        'video',
        'country',

    ];

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }
}

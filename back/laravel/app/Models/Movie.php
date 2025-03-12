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
        'producers',
        'cast',
        'classification',
        'language',
        'release_date',
        'image',
        'video',
        'country',
    ];
}

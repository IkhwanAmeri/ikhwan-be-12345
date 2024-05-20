<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'title',
        'duration',
        'genre',
        'views',
        'overall_rating',
        'poster',
        'theater_name',
        'start_time',
        'end_time',
        'description',
        'theater_room_no'
    ];
}

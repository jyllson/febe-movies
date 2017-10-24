<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name', 'director', 'image_url', 'duration', 'release_date', 'genres'
    ];

    
}

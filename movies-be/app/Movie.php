<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name', 'director', 'image_url', 'duration', 'release_date', 'genres'
    ];

    protected $casts = [
        'genres' => 'array',
    ];

    public function setGenresAttribute($value)
    {
        $this->attributes['genres'] = json_encode($value);
    }    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public static function search($term, $skip, $take){

        if($term!="" || ($skip!="" && $take!="")){
            return Movie::search($term, $skip, $take);
        } else {
            return Movie::all();
        }
    }
}

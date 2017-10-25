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

    public static function search(Request $request){
        $name = $request->input('name');
        $term = $request->input('term');

        if($name){
            $result = DB::table('movies')
            ->where('name', 'LIKE', '%'.$name.'%')
            ->get();
            return $result;
        } elseif($term) {
            $result = DB::table('movies')
            ->where('name', 'LIKE', '%'.$term.'%')
            ->get();
            return $result;
        } else {
            return Movie::all();
        }
    }
}

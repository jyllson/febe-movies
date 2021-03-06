<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;


class MoviesController extends Controller
{
    public function index(Request $request){
        $term = $request->input('term');
        $skip = $request->input('skip');
        $take = $request->input('take');
        
        return Movie::search($term, $skip, $take);
    }

    public function show($id){
    	$movie = Movie::find($id);
        return $movie;
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique',
            'director' => 'required',
            'duration' => 'required|min:1|max:500',
            'release_date' => 'required',
            'image_url' => 'url',
            'release_date' => 'unique',
        ]);
    	$movie = new Movie();
        $movie->name = $request->input('name');
        $movie->director = $request->input('director');
        $movie->image_url = $request->input('image_url');
        $movie->duration = $request->input('duration');
        $movie->release_date = $request->input('release_date');
        $movie->genres = $request->input('genres');
        $movie->save();
    }

    public function update(Request $request, $id){
    	$movie = Movie::find($id);
        $movie->name = $request->input('name');
        $movie->director = $request->input('director');
        $movie->image_url = $request->input('image_url');
        $movie->duration = $request->input('duration');
        $movie->release_date = $request->input('release_date');
        $movie->genres = $request->input('genres');
        $movie->update();

        return $movie;
    }

    public function delete($id){
    	$movie = Movie::find($id);

        $movie->delete();

        return $movie;
    }
}

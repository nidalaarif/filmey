<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Http\Resources\Movie as MovieResource;
use Illuminate\Http\Request;

class MoviesApiController extends Controller
{


    public function movies(){
        $movies = Movie::find(900);
        return new MovieResource($movies);
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Movie;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Config;

class MoviesController extends Controller
{
    public  function getCategories($movie_cat){
        $cats = explode(" / ",$movie_cat);
        $genres = [];
        foreach ($cats as $cat){
            $categoryObject = new Category($cat);
            $genres[] = $categoryObject;
        }
        return $genres;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: remove repeated movies
        $movies =  DB::table('movies')
                        ->distinct()
                        ->orderBy('year','DESC')
                        ->orderBy('ratings','DESC')
                        ->paginate(54);      // take(50)->orderBy('year','DESC')->get();
        return view('movies')->with('movies',$movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        // Get details of the movie
        $data = [];
        //$details =  Movie::find($movie);
        $links = $movie->movie_links()->where('quality_type','!=','screenshot')->get();
        $screenshots = $movie->movie_links()->where('quality_type','screenshot')->get();
        $data['links'] = $links;
        $data['screenshots'] = $screenshots;

        $links = $movie->movie_links()->where('quality_type','!=','screenshot')->get();
        $screenshots = $movie->movie_links()->where('quality_type','screenshot')->get();
        $directors = $movie->crew()->where('profession','director')->get();
        $actors = $movie->crew()->where('profession','!=','director')->get();
        $data['details'] = $movie;
        $data['links'] = $links;
        $data['screenshots'] = $screenshots;
        $data['directors'] = $directors;
        $data['actors'] = $actors;
        $data['genre'] = $this->getCategories($movie->category);
        // ---------------- //
        //  Get related movies

        $related_movies = Movie::take(7)->orWhere('category','like','%'.$movie->category.'%')
                                        ->where('id','!=',$movie->id)
                                        ->orderBy('year','DESC')->get();
        $data['related'] = $related_movies;


        return view('movieDetails',compact('data',$data));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}

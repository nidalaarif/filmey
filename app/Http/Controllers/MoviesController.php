<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Link;
use Illuminate\Http\Request;
use League\Flysystem\Config;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies =  Movie::take(50)->get();
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
        $data = [];
        //$details =  Movie::find($movie);
        $links = $movie->links()->where('quality_type','!=','screenshot')->get();
        $screenshots = $movie->links()->where('quality_type','screenshot')->get();
        $data['links'] = $links;
        $data['screenshots'] = $screenshots;

        $links = $movie->links()->where('quality_type','!=','screenshot')->get();
        $screenshots = $movie->links()->where('quality_type','screenshot')->get();
        $directors = $movie->crew()->where('profession','director')->get();
        $actors = $movie->crew()->where('profession','!=','director')->get();
        $data['details'] = $movie;
        $data['links'] = $links;
        $data['screenshots'] = $screenshots;
        $data['directors'] = $directors;
        $data['actors'] = $actors;
        $data['colors'] = \config('constants.colors.Action');
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

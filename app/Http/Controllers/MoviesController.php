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
    public function updateMovieFields($title,$year){
        $title = str_replace(' ','+',$title);
        $url = 'https://www.omdbapi.com/?t='.$title.'&y='.$year.'&apikey=1efc01bf';
        $flag = false;

        try {
            $jsonData = file_get_contents($url);
            $movieObject = json_decode($jsonData, true);
            if ($movieObject['Response'] == 'True'){
                $flag = true;

            }else{
                $flag = false;
            }
        } catch (\Exception $e) {
            $flag = false;
        }
        return $flag == true ? $movieObject : null;
    }
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
        $bigTitle = 'Browse Movies';
        return view('movies',compact('movies','bigTitle'));
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
//        if ($movie->scraped == 0){
//            $updatedmovie = $this->updateMovieFields($movie->title,$movie->year);
//            if ($updatedmovie != null){
//                $updateArray = [
//                  'rated' => $updatedmovie['Rated'],
//                  'released' => $updatedmovie['Released'],
//                  'runtime' => $updatedmovie['Runtime'],
//                  'genre' => $updatedmovie['Genre'],
//                  'plot' => $updatedmovie['Plot'],
//                  'language' => $updatedmovie['Language'],
//                  'country' => $updatedmovie['Country'],
//                  'awards' => $updatedmovie['Awards'],
//                  'rating_imd' => '',
//                  'rating_rt' => '',
//                  'rating_m' => '',
//                  'metascore' => $updatedmovie['Metascore'],
//                  'imdbVotes' => $updatedmovie['imdbVotes'],
//                  'imdbID' => $updatedmovie['imdbID'],
//                  'dvd' => $updatedmovie['DVD'],
//                  'boxOffice' => $updatedmovie['BoxOffice'],
//                  'production' => $updatedmovie['Production'],
//                  'scraped' => 1,
//                ];
//                if (count($updatedmovie['Ratings']) > 0){
//
//                }else{
//
//                }
//                DB::table('movies')
//                    ->where('id',$movie->id)
//                    ->update();
//            }
//        }
//        // Get details of the movie
//        $data = [];
//        //$details =  Movie::find($movie);
//        $links = $movie->movie_links()->where('quality_type','!=','screenshot')->get();
//        $screenshots = $movie->movie_links()->where('quality_type','screenshot')->get();
//        $data['links'] = $links;
//        $data['screenshots'] = $screenshots;
//
//        $links = $movie->movie_links()->where('quality_type','!=','screenshot')->get();
//        $screenshots = $movie->movie_links()->where('quality_type','screenshot')->get();
//        $directors = $movie->crew()->where('profession','director')->get();
//        $actors = $movie->crew()->where('profession','!=','director')->get();
//        $data['details'] = $movie;
//        $data['links'] = $links;
//        $data['screenshots'] = $screenshots;
//        $data['directors'] = $directors;
//        $data['actors'] = $actors;
//        $data['genre'] = $this->getCategories($movie->category);
//        // ---------------- //
//        //  Get related movies
//        // TODO: FIX related movies categories
//        $related_movies = Movie::take(7)->orWhere('category','like','%'.$movie->category.'%')
//                                        ->where('id','!=',$movie->id)
//                                        ->where('title','!=',$movie->title)
//                                        ->orderBy('year','DESC')->get();
//        $data['related'] = $related_movies;
//
//
//        return view('movieDetails',compact('data'));
        return $this->updateMovieFields('Dumb and Dumber To','2014');
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

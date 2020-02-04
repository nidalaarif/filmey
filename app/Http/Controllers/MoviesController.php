<?php

namespace App\Http\Controllers;

use App\Category;
use App\Movie;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Config;
use function Sodium\add;

class MoviesController extends Controller
{
    public function getInitials($name){
        $name = rtrim(ltrim($name));
        $words = explode(" ", $name);
        $acronym = "";

        foreach ($words as $w) {
            $acronym .= $w[0];
        }
        return $acronym;
    }
    public function insidePar($value){
        $text = $value;
        preg_match('#\((.*?)\)#', $text, $match);
        return $match;
    }
    public function outsidePar($value){
        $input =$value;
        $arr = preg_split('/\(.*?\)/',$input);
        return $arr;
    }
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
        $wrArray = array();

        if ($movie->scraped == 0){
            $updatedmovie = $this->updateMovieFields($movie->title,$movie->year);
            if ($updatedmovie != null){
                $updateArray = [
                  'rated' => $updatedmovie['Rated'],
                  'released' => $updatedmovie['Released'],
                  'runtime' => $updatedmovie['Runtime'],
                  'genre' => $updatedmovie['Genre'],
                  'plot' => $updatedmovie['Plot'],
                  'language' => $updatedmovie['Language'],
                  'country' => $updatedmovie['Country'],
                  'awards' => $updatedmovie['Awards'],
                  'rating_imd' => '',
                  'rating_rt' => '',
                  'rating_m' => '',
                  'metascore' => $updatedmovie['Metascore'],
                  'imdbVotes' => $updatedmovie['imdbVotes'],
                  'imdbID' => $updatedmovie['imdbID'],
                  'dvd' => $updatedmovie['DVD'],
                  'boxOffice' => $updatedmovie['BoxOffice'],
                  'production' => $updatedmovie['Production'],
                  'scraped' => 1,
                ];
                if (count($updatedmovie['Ratings']) > 0){
                    foreach ($updatedmovie['Ratings'] as $rate){
                        if($rate['Source'] == 'Internet Movie Database'){
                            $updateArray['rating_imd'] = $rate['Value'];
                        }elseif ($rate['Source'] == 'Rotten Tomatoes'){
                            $updateArray['rating_rt'] = $rate['Value'];
                        }elseif ($rate['Source'] == 'Metacritic'){
                            $updateArray['rating_m'] = $rate['Value'];
                        }else{
                            $updateArray['rating_imd'] = '';
                            $updateArray['rating_rt'] = '';
                            $updateArray['rating_m'] = '';
                        }
                    }
                }else{
                    $updateArray['rating_imd'] = '';
                    $updateArray['rating_rt'] = '';
                    $updateArray['rating_m'] = '';
                }
                DB::table('movies')
                    ->where('id',$movie->id)
                    ->update($updateArray);

                $writers = explode(', ',$updatedmovie['Writer']);
                foreach ($writers as $wr){
                    $writerName = $this->outsidePar($wr)[0];
                    $writerDesc = count($this->insidePar($wr)) > 1 ? $this->insidePar($wr)[1] : '';
                    DB::table('crews')->insert(
                        [
                            'name'=>$writerName,
                            'description'=> $writerDesc,
                            'profession' => 'writer',
                            'actor_role' => 'MOVIE WRITER',
                            'avatar' => 'avatars/default_avatar.jpg',
                            'movie_id'=> $movie->id]
                    );
                }

            }
        }
        // Get details of the movie
        $movie = Movie::where('id',$movie->id)->first();
        $data = [];
        //$details =  Movie::find($movie);
        $links = $movie->movie_links()->where('quality_type','!=','screenshot')->get();
        $screenshots = $movie->movie_links()->where('quality_type','screenshot')->get();
        $data['links'] = $links;
        $data['screenshots'] = $screenshots;

        $links = $movie->movie_links()->where('quality_type','!=','screenshot')->get();
        $screenshots = $movie->movie_links()->where('quality_type','screenshot')->get();
        $directors = $movie->crew()->where('profession','director')->get();
        $actors = $movie->crew()->where('profession','actor')->get();
        $writers = $movie->crew()->where('profession','writer')->get();

        // add name initials to the writers
        if (count($writers) > 0) {
            foreach ($writers as $wr) {
                $wr['initials'] = $this->getInitials($wr->name);
            }
        }
        // ----- //
        // split productors to array
        $production = explode(',',$movie->production);
        $prArray = [];
        foreach ($production as $p){
            $a = [
              'name' => $p,
              'init' =>   $this->getInitials($p)
            ];
            $prArray[] = $a;
        }
        // ------//
        $data['details'] = $movie;
        $data['links'] = $links;
        $data['screenshots'] = $screenshots;
        $data['directors'] = $directors;
        $data['actors'] = $actors;
        $data['writers'] = $writers;
        $data['producers'] = $prArray;
        $data['genre'] = $this->getCategories($movie->category);
        // ---------------- //
        //  Get related movies
        // TODO: FIX related movies categories
        $related_movies = Movie::take(7)->orWhere('category','like','%'.$movie->category.'%')
                                        ->where('id','!=',$movie->id)
                                        ->where('title','!=',$movie->title)
                                        ->orderBy('year','DESC')->get();
        $data['related'] = $related_movies;


        return view('movieDetails',compact('data'));

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

<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Crew;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
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
    public function home(){
        $random = random_int(30,13000);
        // slider movies: sorted by year
        $movies = Movie::skip($random)->take(30)->orderBy('year','DESC')->get();
        foreach ($movies as $movie){
            $movie['genre'] = $this->getCategories($movie->category);
        }

        // -------------- //
        // For The top rated movies section //
        $topRated = Movie::take(20)->orderBy('ratings','DESC')->get();
        foreach ($topRated as $item){
            $item['genre'] = $this->getCategories($item->category);
        }
        // -------------- //
        // For The Latest movies section //
        $latest = Movie::skip(20)->take(20)->orderBy('year','DESC')->get();
        foreach ($latest as $item){
            $item['genre'] = $this->getCategories($item->category);
        }
        // -------------- //
        // For last year best movies section //
        $lastYear = Movie::take(20)->where('year',date('Y') - 1)->orderBy('year','DESC')->orderBy('ratings','DESC')->get();
        foreach ($lastYear as $item){
            $item['genre'] = $this->getCategories($item->category);
        }
        // -------------- //
        // For spotlight celebrities //

        $spotlight_celeb = DB::table('crews')
            ->take(8)
            ->select('movie_id', DB::raw('id,name,avatar,profession,count(*) as total'))
            ->groupBy('id','name','avatar','profession')
            ->having('profession','=','actor')
            ->orderBy('total','DESC')
            ->get();







        $hi = date('Y') - 1;
        return view('index',compact('movies','topRated','latest','lastYear','spotlight_celeb','hi'));
    }

    public  function search(){
        $categories = [
            'GENRE',
            'Action'  ,
            'Adventure' ,
            'Animation' ,
            'Biography'  ,
            'Comedy'  ,
            'Crime'  ,
            'Documentary'  ,
            'Drama'  ,
            'Family'  ,
            'Fantasy' ,
            'Film-Noir'  ,
            'Game-Show' ,
            'History'  ,
            'Horror'  ,
            'Music'  ,
            'Musical'  ,
            'Mystery'  ,
            'News' ,
            'Reality-TV' ,
            'Romance' ,
            'Sci-Fi' ,
            'Sport' ,
            'Talk-Show' ,
            'Thriller' ,
            'War'  ,
            'Western' ,
            // etc
        ];
        $keyword = str_replace('+',' ',Input::get('q'))  ;
        $new_keyword = $keyword;
        $genre = str_replace('+',' ',Input::get('genre'))  ;
        $new_genre = $genre;
        $order = str_replace('+',' ',Input::get('order_by'))  ;
        $new_order = $order;
        $sort = 'ASC';
        $operator = 'like';

        if (ucfirst($genre) != 'Genre'){
            $g = new Category('Action');
            if(!isset($g->colors[ucfirst($genre)])){
                $genre = '';
                $operator = '!=';
            }
        }else{
            $genre = $keyword;
        }

        if ($order == 'LATEST'){
            $order = 'year';
            $sort = 'DESC';
        }elseif ($order == 'OLDEST'){
            $order = 'year';
            $sort = 'ASC';
        }elseif (!in_array($order,['year','ratings','title'])){
            $order = 'title';
            $sort = 'ASC';
        }else{
            if ($order == 'title'){
                $sort = 'ASC';
            }else{
                $sort = 'DESC';
            }
        }
        if ($keyword == ''){
            $keyword = '';
        }

        $movies = Movie::where('title','like','%'.$keyword.'%')
                        ->orderByRaw("IF(title = '{$keyword}',2,IF(title LIKE '{$keyword}%',1,0)) DESC")

                        ->where('category',$operator,'%'.$genre.'%')
                        ->orderBy($order,$sort)
                        ->paginate(54);
        return view('movies',compact('movies','new_keyword','categories','new_order','new_genre')); //'query:'.$keyword.'  order: '.$order.'   sort: '.$sort.'     genre: '.$genre.'   operator: '.$operator; //
    }


}














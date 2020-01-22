<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;
use App\Category;
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
        // slider movies: sorted by year
        $movies = Movie::take(20)->orderBy('year','DESC')->get();
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







        $hi = date('Y') - 1;
        return view('index',compact('movies','topRated','latest','lastYear','hi'));
    }
}














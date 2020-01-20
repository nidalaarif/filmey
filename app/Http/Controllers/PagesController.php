<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $movies = Movie::take(15)->orderBy('year','DESC')->get();
        return view('index',compact('movies',$movies));
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@home');
Route::get('/search', 'PagesController@search');
Route::get('/category/{categoryName}', 'PagesController@show_category');

//Route::get('/movies/{id}', array('middleware' => 'cors', 'uses' => 'MoviesController@show'));

//Route::get('/movies', 'MoviesController@index');
Route::resource('movies', 'MoviesController')->middleware('cors');
Route::get('/movie','MoviesApiController@movies');






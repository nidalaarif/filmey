<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title','title-trimed','year','category',
        'ratings','synopsis','poster','trailer-link','other-id',
        'rated','released','runtime','plot',
        'language','country','avards','rating_imd',
        'rating_rt','rating_m','metascore','imdbVotes',
        'imdbID','dvd','boxOffice','production','scraped'
        ];



    public $primaryKey = 'id';

    public function movie_links(){
        return $this->hasMany(Link::class);
    }

    public function crew(){
        return $this->hasMany(Crew::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title','title-trimed','year','category','ratings','synopsis','poster','trailer-link','other-id'
        ];


}

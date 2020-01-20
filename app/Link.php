<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'link','quality_type','movie'
        ];

    public function movie(){ 
        return $this->belongsTo(Movie::class);
    }
}

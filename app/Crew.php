<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    protected $fillable = [
        'name','profession','actor_role','avatar'
    ];
    public function movie(){
        return $this->belongsToMany(Movie::class);
    }
}

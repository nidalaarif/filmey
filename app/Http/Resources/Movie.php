<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Crew as CrewResource;
use App\Http\Resources\Link as LinkResource;

class Movie extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'Title' => $this->title,
            'year' => $this->year,
            'links' =>  LinkResource::collection($this->movie_links),
            'Crew' => CrewResource::collection($this->crew)
        ];
    }

    public function with($request)
    {
        return [
          'Author' => 'Nidal AARIF',
          'At' => Carbon::now()
        ];
    }
}

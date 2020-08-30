<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Link extends JsonResource
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
            'link' => asset('/'.$this->link),
            'quality' => $this->quality_type,
            'play_link' => $this->play_link
        ];
    }
}

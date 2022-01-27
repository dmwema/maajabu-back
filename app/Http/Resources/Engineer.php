<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Engineer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'year_experience' => $this->year_experience,
            'img_url' => $this->img_url
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Horaire extends JsonResource
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
            'day' => $this->day,
            'go_before_midday' => $this->go_before_midday,
            'end_before_midday' => $this->end_before_midday,
            'go_after_midday' => $this->go_after_midday,
            'end_after_midday' => $this->end_after_midday,
        ];
    }
}

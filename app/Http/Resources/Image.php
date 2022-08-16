<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Image extends JsonResource
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
            'img_url' => env('APP_URL').Storage::url($request->img_url),
            'studio_id' => $this->year_experience,
        ];
    }
}

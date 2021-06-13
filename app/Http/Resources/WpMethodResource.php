<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WpMethodResource extends JsonResource
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
            'user' => new UserResource($this->user),
            'nilai' => $this->wp_value,
            'rank' => $this->rank
        ];
    }
}

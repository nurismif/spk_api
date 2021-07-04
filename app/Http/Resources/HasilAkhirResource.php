<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HasilAkhirResource extends JsonResource
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
            'method' => $this->method,
            'sensitivity' => $this->sensitivity,
            'values' => $this->method == 'ahp'
                ? AhpMethodResource::collection($this->method_values)
                : WpMethodResource::collection($this->method_values),
        ];
    }
}

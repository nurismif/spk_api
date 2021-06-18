<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'nip' => $this->nip,
            'nama' => $this->nama,
            'username' => $this->username,
            'jabatan' => $this->jabatan,
            'jenis_kelamin' => $this->jenis_kelamin,
            'jurusan' => $this->jurusan
        ];
    }
}

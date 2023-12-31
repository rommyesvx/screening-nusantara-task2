<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return[
            'id' => $this->id,
            'id_kelas' => $this->id_kelas,
            'nama' => $this->nama,
            'nisn' => $this->alamat,
            'alamat' => $this->peminatan,
            'ekskul' => $this->ekskul
        ];
    }
}

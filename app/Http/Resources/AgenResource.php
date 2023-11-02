<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'kd_agen' => $this->kd_agen,
            'nama_toko' => $this->nama_toko,
            'nama_pemilik' => $this->nama_pemilik,
            'alamat' => $this->alamat,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'gambar_toko' => env('ASSET_URL'). "upload/". $this->gambar_toko
        ];
    }
}

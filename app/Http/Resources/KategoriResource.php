<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KategoriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'kd_kategori' => $this->kd_kategori,
            'kategori' => $this->kategori,
            'gambar_kategori' => env('ASSET_URL'). "/upload/".$this->gambar_kategori
        ];
    }
}

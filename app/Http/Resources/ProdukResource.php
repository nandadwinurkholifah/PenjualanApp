<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Rupiah;

class ProdukResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'kd_produk' =>$this->kd_produk,
            'kd_kategori' =>$this->kd_kategori,
            'nama_produk' =>$this->nama_produk,
            'harga' =>$this->harga,
            'harga_rupiah' => Rupiah::get_rupiah($this->harga),
            'gambar_produk' =>env('ASSET_URL')."/upload/".$this->gambar_produk,
            'stok' =>$this->stok,
            'kategori' =>$this->kategori,
        ];
    }
}

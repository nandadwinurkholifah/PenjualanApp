<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Rupiah;

class KeranjangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'kd_keranjang' => $this->kd_keranjang,
            'username' => $this->username,
            'kd_produk' => $this->kd_produk,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
            'harga_rupiah' => Rupiah::get_rupiah($this->harga),
            'nama_produk' => $this->produk->nama_produk,
            'kategori' => $this->produk->kategori->kategori,
            'gambar_produk' => env('ASSET_URL')."/upload/".$this->gambar_produk,

        ];
    }
}

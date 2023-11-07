<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Rupiah;
class TransaksiDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'kd_detail_transaksi' =>$this->kd_detail_transaksi,
            'no_faktur' =>$this->no_faktur,
            'kd_produk' =>$this->kd_produk,
            'jumlah' =>$this->jumlah,
            'harga' =>$this->harga,
            'harga_rupiah' => Rupiah::get_rupiah($this->harga),
            'nama_produk' =>$this->produk->nama_produk,
            'kategori' =>$this->produk->kategori->kategori,
            'gambar_produk' =>env('ASSET_URL')."/upload/".$this->produk->gambar_produk,
        ];
    }
}

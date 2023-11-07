<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Rupiah;

class TransaksiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'kd_transaksi' =>$this->kd_transaksi,
            'no_faktur' =>$this->no_faktur,
            'tgl_penjualan' =>$this->tgl_penjualan,
            'kd_agen' =>$this->kd_agen,
            'username' =>$this->username,
            'total' =>$this->total,
            'harga_rupiah' => Rupiah::get_rupiah($this->total),
        ];
    }
}

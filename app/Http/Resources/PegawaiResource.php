<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class PegawaiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'username' => $this->username,
            'password' => $this->password,
            'nama_pegawai' => $this->nama_pegawai,
            'jk' => $this->jk,
            'alamat' => $this->alamat,
            'is_active' => $this->is_active,
        ];
    }
}

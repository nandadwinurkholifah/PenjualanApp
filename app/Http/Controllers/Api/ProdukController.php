<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Http\Resources\ProdukResource;

class ProdukController extends Controller
{
    public function get_produk_kategori(Request $request)
    {
        $kd_kategori = $request->input('kd_kategori');
        $produk = Produk::where([
            ['kd_kategori',$kd_kategori],
            ['stok','>',0]
        ])->get();

        if ($produk->isEmpty()) {
            return response()->json([
                'status' =>FALSE,
                'msg' => 'Produk Tidak Ditemukan',
            ],200);
        }
        return ProdukResource::collection($produk); 
    }

    
}

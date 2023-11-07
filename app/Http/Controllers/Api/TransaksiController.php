<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\KeranjangResource;
use App\Http\Resources\TransaksiResource;
use App\Http\Resources\TransaksiDetailResource;
use Validator;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;

class TransaksiController extends Controller
{
    public function add_cart(Request $request)
    {
        $input = $request->all();

        $validasi = Validator::make($input,[
            'username' => 'required|max:100',
            'kd_produk' => 'required|numeric',
            'jumlah' => 'required|numeric',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => FALSE,
                'msg' => $validasi->errors(),
            ],400);
        }

        $data['username'] = $request->input('username');
        $data['kd_produk'] = $request->input('kd_produk');
        $data['jumlah'] = $request->input('jumlah');

        //mencari data stok produk
        $data_produk = Produk::find($data['kd_produk']);
        $stok_produk = $data_produk->stok;

        //mencari jumlah produk, dari produk itu sendiri didalam tabel keranjang
        $jumlah_barang_cart = Keranjang::where('kd_produk',$data['kd_produk'])->sum('jumlah');

        $stok_hasil = $stok_produk - $jumlah_barang_cart ;

        //jika stok hasil < dari jumlah yang diinputkan maka akan menampilkan tulisan stok barang tidak mencukupi
        if ($stok_hasil < $data['jumlah']) {
            return response()->json([
                'status' =>FALSE,
                'msg' => 'Stok Barang Tidak Mencukupi'
            ],200);
        }

        $data['harga'] = $data_produk->harga;

        Keranjang::create($data);
        return response()->json([
            'status' =>TRUE,
            'msg' => 'Data Berhasil Ditambahkan',
        ],200);
    }

    function get_cart(Request $request)
    {   
        $username = $request->input('username');
        $keranjang = Keranjang::where('username',$username)->get();

        if ($keranjang->isEmpty()) {
            return response()->json([
                'status' =>FALSE,
                'msg' => 'Keranjang Tidak Ditemukan',
            ],200);
        }else {
            return KeranjangResource::collection($keranjang); 
        }
    }

    function delete_item_cart(Request $request)
    {
        $kd_keranjang = $request->input('kd_keranjang');
        $keranjang = Keranjang::find($kd_keranjang);
        if (is_null($keranjang)) {
            return response()->json([
                'status' =>FALSE,
                'msg' => 'Data Tidak Ditemukan',
            ],404);
        }

        $keranjang->delete();
        return response()->json([
            'status' => TRUE,
            'msg' => 'Data Berhasil Dihapus',
        ],200);
    }

    function delete_cart(Request $request)
    {
        $username = $request->input('username');
        Keranjang::where('username',$username)->delete();
        return response()->json([
            'status' => TRUE,
            'msg' => 'Data Cart Berhasil Dihapus',
        ],200);
    }

    function checkout(Request $request)
    {
        $data['tgl_penjualan'] = date("Y-m-d");
        $data['kd_agen'] = $request->input('kd_agen');
        $data['username'] = $request->input('username');

        $data['no_faktur'] = $this->get_nomor_faktur();
        $data['total'] = $this->get_total_cart($data['username']);
        Transaksi::create($data);

        $cart = Keranjang::where('username',$data['username'])->get();
        foreach($cart as $row)
        {
            $data_cart['no_faktur']= $data['no_faktur'];
            $data_cart['kd_produk']= $row->kd_produk;
            $data_cart['jumlah']= $row->jumlah;
            $data_cart['harga']= $row->harga;
            TransaksiDetail::create($data_cart);

            $produk = Produk::find($row->kd_produk);
            $data_produk['stok'] = $produk->stok - $row->jumlah;
            $produk->update($data_produk);
        }

        Keranjang::where('username',$data['username'])->delete();
        return response()->json([
            'status'=>TRUE,
            'msg'=>'Checkout Berhasil'
        ],200);
    }

    function get_nomor_faktur()
    {
        $query = DB::select('SELECT MAX(RIGHT(no_faktur,6)) AS max_faktur FROM transaksi WHERE DATE(tgl_penjualan)=CURDATE()');
        $kd = "";
        if (count($query) > 0) {
            foreach($query as $row)
            {
                $tmp = ((int)$row->max_faktur)+1;
                $kd = sprintf("%06s", $tmp);
            }  
        }
        else {
            $kd = "000001";
        }
        $hasil = date('dmy').$kd;
            return $hasil;
    }

    private function get_total_cart($username)
    {
        $data_keranjang = Keranjang::where('username',$username)->get();
        $total = 0;
        foreach ($data_keranjang as $datker) {
            $total = $total + ($datker->jumlah * $datker->harga);
        }
        return $total;
    }

    function get_transaksi(Request $request)
    {
        $username = $request->input('username');
        $data_transaksi = Transaksi::where('username',$username)->get();
        if ($data_transaksi->isEmpty()) {
            return response()->json([
                'status' => FALSE,
                'msg' => 'Record Tidak Ditemukan',
            ],200);
        }
        return TransaksiResource::collection($data_transaksi);
    }

    function get_detail_transaksi(Request $request)
    {
        $no_faktur = $request->input('no_faktur');
        $data_detail_transaksi = TransaksiDetail::where('no_faktur',$no_faktur)->get();
        if ($data_detail_transaksi->isEmpty()) {
            return response()->json([
                'status' => FALSE,
                'msg' => 'Record Tidak Ditemukan',
            ],200);
        }
        return TransaksiDetailResource::collection($data_detail_transaksi);
    }
   
}
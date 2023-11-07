<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Agen;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produk = Produk::count();
        $agen = Agen::count();
        $transaksi = TransaksiDetail::sum('jumlah');
        $pendapatan = Transaksi::sum('total');

        $nama_produk = [];
        $jumlah_penjualan = [];
        $data_produk = Produk::all();

        foreach ($data_produk as $data) {

            $nama_produk[] = $data->nama_produk;

            $jumlah_transaksi = TransaksiDetail::where('kd_produk',$data->kd_produk)->sum('jumlah');
            
            $jumlah_penjualan[] = $jumlah_transaksi;
        }
        return view('home', compact('produk','agen','transaksi','pendapatan','nama_produk','jumlah_penjualan'));
    }
}

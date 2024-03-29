<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiMasuk;
use App\Models\Produk;
use App\Models\Supplier;
use Validator;
use Carbon\Carbon;

class TransaksiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $start_date = $request->get('start_date');
    $end_date = $request->get('end_date');
    
    // Tambahkan ini untuk mengecek nilai $start_date dan $end_date
    // dd($start_date, $end_date);

    $transaksi_masuks = TransaksiMasuk::orderBy('tgl_transaksi', 'DESC')->paginate(5);

    if ($start_date != "" && $end_date != "") {
        $transaksi_masuks = TransaksiMasuk::whereBetween('tgl_transaksi', [$start_date, $end_date])->orderBy('tgl_transaksi', 'DESC')->paginate(3);
    
        $start_date = Carbon::parse($start_date)->format('Y-m-d');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');
    }
    

    return view('transaksi_masuk.index', compact('transaksi_masuks', 'start_date', 'end_date'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::all();
        $suppliers = Supplier::all();
        return view('transaksi_masuk.create',compact('produks','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validasi = Validator::make($input,[
            'tgl_transaksi' => 'required|date',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('transaksi_masuk.create')->withErrors($validasi)->withInput();
        }

        TransaksiMasuk::create($input);
        $produk = Produk::find($input['kd_produk']);
        $data['stok'] = $produk->stok + $input['jumlah'];
        // dd($data);
        $produk->update($data);

        return redirect()->route('transaksi_masuk.index')->with('status','Transaksi Masuk Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi_masuk = TransaksiMasuk::findOrFail($id);
        $jumlah = $transaksi_masuk->jumlah;

        $produk = Produk::find($transaksi_masuk->kd_produk);
        $data['stok'] = $produk->stok - $jumlah;
        $produk->update($data);

        $transaksi_masuk->delete();
        return redirect()->route('transaksi_masuk.index')->with('status','Transaksi Masuk Berhasil dihapus');
    }
}

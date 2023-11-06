<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Validator;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produks = Produk::paginate(3);
        $kategoris = Kategori::all();
        $nama_kategori = '';
        $filterKeyword =$request->get('keyword'); 
        if ($filterKeyword) 
        {
            //dijalankan jika ada pencarian
            $produks = Produk::where('nama_produk','LIKE',"%$filterKeyword%")->paginate(3);
        }

        $filter_by_kategori =$request->get('kd_kategori'); 
        if ($filter_by_kategori) 
        {
            //dijalankan jika ada pencarian
            $produks = Produk::where('kd_kategori',$filter_by_kategori)->paginate(3);
            $data_kategori = Kategori::find($filter_by_kategori);
            $nama_kategori = $data_kategori->kategori;
        }

        return view('produk.index', compact('produks', 'kategoris', 'nama_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('produk.create',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validasi = Validator::make($input,[
            'nama_produk' => 'required|max:255',
            'kd_kategori' => 'required',
            'harga' => 'required|numeric',
            'gambar_produk' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('produk.create')->withErrors($validasi)->withInput();
        }

        if ($request->file('gambar_produk')->isValid()) {
            $gambar_produk = $request->file('gambar_produk');
            $extention = $gambar_produk->getClientOriginalExtension();
            $namaFoto = "produk/".date('YmdHis').".".$extention;
            $upload_path = 'public/upload/produk';
            $request->file('gambar_produk')->move($upload_path,$namaFoto);
            $input['gambar_produk'] = $namaFoto;
        }
        
        $input['stok'] = 0;
        Produk::create($input);
        return redirect()->route('produk.index')->with('status','Produk Berhasil Disimpan');
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
        $produks = Produk::findOrFail($id);
        $kategoris = Kategori::all();
        return view('produk.edit',compact('produks','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produks = Produk::findOrFail($id);
        $input = $request->all();

        $validasi = Validator::make($input,[
            'nama_produk' => 'sometimes|max:225',
            'kd_kategori' => 'sometimes',
            'harga' => 'sometimes|numeric',
            'gambar_produk' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('produk.edit',[$id])->withErrors($validasi);
        }

        if ($request->hasFile('gambar_produk')) {
            if ($request->file('gambar_produk')->isValid())
            {
                Storage::disk('upload')->delete($produks->gambar_produk);

                $gambar_produk = $request->file('gambar_produk');
                $extention = $gambar_produk->getClientOriginalExtension();
                $namaFoto = "produk/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/upload/produk';
                $request->file('gambar_produk')->move($upload_path, $namaFoto);
                $input['gambar_produk'] = $namaFoto;
            }
        }

        $produks->update($input);
        return redirect()->route('produk.index')->with('status','Produk Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produks = Produk::findOrFail($id);
        $produks->delete();
        Storage::disk('upload')->delete($produks->gambar_produk);
        return redirect()->route('produk.index')->with('status','Data Produk Berhasil dihapus');
    }
}

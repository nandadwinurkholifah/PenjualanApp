<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Validator;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategoris = Kategori::paginate(3);
        $filterKeyword =$request->get('keyword'); 
        if ($filterKeyword) 
        {
            //dijalankan jika ada pencarian
            $kategoris = Kategori::where('kategori','LIKE',"%$filterKeyword%")->paginate(3);
        }
        return view('kategori.index',compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input =$request->all();

        $validasi = Validator::make($input,[
            'kategori' => 'required|max:225',
            'gambar_kategori' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('kategori.create')->withErrors($validasi)->withInput();
        }

        

        if ($request->file('gambar_kategori')->isValid()) {
            $gambar_kategori = $request->file('gambar_kategori');
            $extention = $gambar_kategori->getClientOriginalExtension();
            $namaFoto = "kategori/".date('YmdHis').".".$extention;
            $upload_path = 'public/upload/kategori';
            $request->file('gambar_kategori')->move($upload_path,$namaFoto);
            $input['gambar_kategori'] = $namaFoto;
        }
        Kategori::create($input);
        return redirect()->route('kategori.index')->with('status','Kategori berhasil ditambahkan');
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
        $kategoris = Kategori::findOrfail($id);
        return view('kategori.edit', compact('kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategoris = Kategori::findOrfail($id);

        $input = $request->all();

        $validasi = Validator::make($input,[
            'kategori' => 'sometimes|max:225',
            'gambar_kategori' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('kategori.edit',[$id])->withErrors($validasi);
        }

        if ($request->hasFile('gambar_kategori')) {
            if ($request->file('gambar_kategori')->isValid())
            {
                Storage::disk('upload')->delete($kategoris->gambar_kategori);

                $gambar_kategori = $request->file('gambar_kategori');
                $extention = $gambar_kategori->getClientOriginalExtension();
                $namaFoto = "kategori/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/upload/kategori';
                $request->file('gambar_kategori')->move($upload_path, $namaFoto);
                $input['gambar_kategori'] = $namaFoto;
            }
        }

        $kategoris->update($input);
        return redirect()->route('kategori.index')->with('status','Kategori Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategoris = Kategori::findOrfail($id);
        $kategoris->delete();
        Storage::disk('upload')->delete($kategoris->gambar_kategori);
        return redirect()->route('kategori.index')->with('status','Kategori Berhasil dihapus');
    }
}

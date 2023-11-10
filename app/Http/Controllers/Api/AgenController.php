<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AgenResource;
use App\Models\Agen;


class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AgenResource::collection(Agen::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validasi = Validator::make($input,[
            'nama_toko' => 'required|max:255',
            'nama_pemilik' => 'required|max:255',
            'alamat'=> 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'gambar_toko' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' =>FALSE,
                'msg' => $validasi->errors(),
            ],400);
        }

        if ($request->file('gambar_toko')->isValid()) {
            $gambar_toko = $request->file('gambar_toko');
            $extention = $gambar_toko->getClientOriginalExtension();
            $namaFoto = "agen/".date('YmdHis').".".$extention;
            $upload_path = 'public/upload/agen';
            $request->file('gambar_toko')->move($upload_path,$namaFoto);
            $input['gambar_toko'] = $namaFoto;
        }

        if(Agen::create($input)) {
            //respons berhasil
            return response()->json([
                'status' => TRUE,
                'msg' => 'Agen Berhasil Disimpan',
            ],201);
        }
        else {
            //response gagal
            return response()->json([
                'status' => FALSE,
                'msg' => 'Agen Gagal Disimpan',
            ],400);
        
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agen = Agen::find($id);
        if (is_null($agen)) {
            return response()->json([
                'status' => FALSE,
                'msg' => 'Record Not Found',
            ],404);
        }
        return new AgenResource($agen);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();

        $agen = Agen::find($id);

        if (is_null($agen)) {
            return respose()->json([
                'status' => FALSE,
                'msg' => 'Record Not Found',
            ],404);   
        }

        $validasi = Validator::make($input,[
            'nama_toko' => 'required|max:255',
            'nama_pemilik' => 'required|max:255',
            'alamat'=> 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'gambar_toko' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' =>FALSE,
                'msg' => $validasi->errors(),
            ],400);
        }

        if ($request->hasFile('gambar_toko')) {
            if ($request->file('gambar_toko')->isValid())
            {
                Storage::disk('upload')->delete($agen->gambar_toko);

                $gambar_toko = $request->file('gambar_toko');
                $extention = $gambar_toko->getClientOriginalExtension();
                $namaFoto = "agen/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/upload/agen';
                $request->file('gambar_toko')->move($upload_path, $namaFoto);
                $input['gambar_toko'] = $namaFoto;
            }
        }

        $agen->update($input);
        return response()->json([
            'status' => TRUE,
            'msg' => "Data Berhasil diupdate",
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agen = Agen::find($id);

        if (is_null($agen)) {
            return response()->json([
                'status' => FALSE,
                'msg' => 'Record Not Found',
            ],404);
        }

        $agen->delete();
        Storage::disk('upload')->delete($agen->gambar_toko);
        return response()->json([
            'status' => TRUE,
            'msg' => 'Data Berhasil dihapus',
        ],200);
    }

    public function search(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        return AgenResource::collection(Agen::where('nama_toko','LIKE',"%$filterKeyword%")->get());
    }
}

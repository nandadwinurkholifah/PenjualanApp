<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pegawais = Pegawai::paginate(3);
        $filterKeyword =$request->get('keyword'); 
        if ($filterKeyword) 
        {
            //dijalankan jika ada pencarian
            $pegawais = Pegawai::where('nama_pegawai','LIKE',"%$filterKeyword%")->paginate(3);
        }
        return view('pegawai.index',compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'username' => 'required|max:100|unique:pegawai',
            'password' => 'required|min:6|max:50',
            'nama_pegawai' => 'required|max:255',
            'alamat' => 'required|max:255',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('pegawai.create')->withInput()->withErrors($validasi);
        }

        $data['password'] = password_hash($request->input('password'),PASSWORD_DEFAULT);
        Pegawai::create($data);
        return redirect()->route('pegawai.index')->with('status','Pegawai Berhasil ditambahkan');
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
        $pegawais = Pegawai::findorfail($id);
        return view('pegawai.edit',compact('pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawais = Pegawai::findOrFail($id);
        $data = $request->all();

        $validator = Validator::make($data,[
            'password' => 'sometimes|nullable|min:6|max:50',
            'nama_pegawai' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);

        if ($validator->fails()) 
        {
            return redirect()->route('pegawai.edit',[$id])->withErrors($validator);
        }
        if ($request->input('password')) 
        {
            $data['password'] = password_hash($request->input('password'),PASSWORD_DEFAULT);
        }
        else {
            $data = Arr::except($data,['password']);
        }

        $pegawais->update($data);
        return redirect()->route('pegawai.index')->with('status',' Data pegawai Berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pegawai::findOrFail($id);
        $data->delete();
        return redirect()->route('pegawai.index')->with('status','Data pegawai berhasil didelete');
    }
}

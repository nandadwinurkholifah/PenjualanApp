<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $suppliers = Supplier::paginate(3);
        $filterKeyword =$request->get('keyword'); 
        if ($filterKeyword) 
        {
            //dijalankan jika ada pencarian
            $suppliers = Supplier::where('nama_supplier','LIKE',"%$filterKeyword%")->paginate(3);
        }
        return view('supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama_supplier' => 'required|max:255',
            'alamat_supplier' => 'required|max:255'
        
        ]);

        if ($validasi->fails()) {
            return redirect()->route('supplier.create')->withInput()->withErrors($validasi);
        }
        Supplier::create($data);
        return redirect()->route('supplier.index')->with('status', 'Supplier Berhasil ditambahkan');
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
        $suppliers = Supplier::findorfail($id);
        return view('supplier.edit',compact('suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $suppliers = Supplier::findorfail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama_supplier' => 'sometimes|max:255',
            'alamat_supplier' => 'sometimes|max:255'
        ]);
        if ($validasi->fails()) {
            return redirect()->route('supplier.edit', $id)->withErrors($validasi);
        }
        $suppliers->update($data);
        return redirect()->route('supplier.index')->with('status', 'Supplier Berhasil diupdate ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suppliers = Supplier::findorfail($id);
        $suppliers->delete();
        
        return redirect()->route('supplier.index',compact('suppliers'))->with('status','Supplier berhasil didelete');
    }
}

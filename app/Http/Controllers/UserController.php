<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            //jika ada pencarian
            $users = User::where('name','LIKE',"%$filterKeyword%")->paginate(2);
        }
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:100|unique:users',
            'password' => 'required|min:6',
            'level' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('user.create')->withInput()->withErrors($validasi);
        }

        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('user.index')->with('status','User Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::findorfail($id);
        // dd($users);
        return view('user.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data,[
            'name' => 'sometimes|max:255',
            'username' => 'sometimes|max:100|unique:users,username,'.$id,
            'email' => 'sometimes|max:255|unique:users,email,'.$id,
            'password' => 'sometimes|nullable|min:6'
        ]);
        if ($validasi->fails()) {
            return redirect()->route('user.edit',$id)->withErrors($validasi);
        }
        if ($request->input('password')) {
            $data['password'] = bcrypt($data['password']);
        }
        else {
            $data = Arr::except($data,['password']);
        }

        $users->update($data);
        return redirect()->route('user.index')->with('status','Data user Berhasil diupdate ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('user.index')->with('status','Data user berhasil didelete');
    }
}

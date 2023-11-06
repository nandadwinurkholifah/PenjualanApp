<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Validator;
use App\Http\Resources\PegawaiResource;

class PegawaiController extends Controller
{
    public function login_pegawai(Request $request) 
    {
        $input = $request->all();
        $validasi = Validator::make($input,[
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' =>FALSE,
                'msg' => $validasi->errors(),
            ],400);
        }

        $username = $request->input('username');
        $password = $request->input('password');

        $pegawai = Pegawai::where([
            ['username',$username],
            ['is_active',1]
        ])->first();

        if (is_null($pegawai)) {
            // tidak ditemuka
            return response()->json([
                'status' =>FALSE,
                'msg' => 'Username Tidak Ditemukan',
            ],400);

        }else {
            // ditemukan
            if (password_verify($password,$pegawai->password)) {
                // password sesuai
                return response()->json([
                    'status' =>TRUE,
                    'msg' => 'Username Ditemukan',
                    'pegawai' => new PegawaiResource($pegawai)
                ],200);
                
            }else {
                //password tidak sesuai
                return response()->json([
                    'status' =>FALSE,
                    'msg' => 'Username & Password Tidak Sesuai',
                ],200);
            }
        }
    }
}

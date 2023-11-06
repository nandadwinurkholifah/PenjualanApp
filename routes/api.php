<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AgenController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('agen', AgenController::class);
Route::get('search_agen', [AgenController::class,'search']);
Route::post('login_pegawai', 'App\Http\Controllers\Api\PegawaiController@login_pegawai');
Route::get('get_kategori', 'App\Http\Controllers\Api\KategoriController@get_all');
Route::post('get_produk', 'App\Http\Controllers\Api\ProdukController@get_produk_kategori');
Route::post('add_cart', 'App\Http\Controllers\Api\TransaksiController@add_cart');
Route::post('get_cart', 'App\Http\Controllers\Api\TransaksiController@get_cart');
Route::post('delete_item_cart', 'App\Http\Controllers\Api\TransaksiController@delete_item_cart');
Route::post('delete_cart', 'App\Http\Controllers\Api\TransaksiController@delete_cart');
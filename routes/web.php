<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiMasukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
Route::match(["get","post"],"/register",function(){
    return redirect('login');
})->name("register");

Route::group(['middleware' => ['auth']],function(){ 

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('user', UserController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('pegawai', PegawaiController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class);
Route::resource('transaksi_masuk', TransaksiMasukController::class);
Route::get('agen', 'App\Http\Controllers\AgenController@index')->name('agen');
Route::get('report', 'App\Http\Controllers\ReportPenjualanController@index')->name('report');
Route::get('cetak_pdf', 'App\Http\Controllers\ReportPenjualanController@cetak_pdf')->name('cetak_pdf');
Route::get('cetak_excel', 'App\Http\Controllers\ReportPenjualanController@cetak_excel')->name('cetak_excel');

});
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\Supplier;

class TransaksiMasuk extends Model
{
    use HasFactory;
    protected $table = 'transaksi_masuk';
    protected $primaryKey = 'kd_transaksi_masuk';
    protected $fillable = [
        'kd_produk',
        'kd_supplier',
        'tgl_transaksi',
        'jumlah',
        'harga',
    ];

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk','kd_produk');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier','kd_supplier');
    }
}

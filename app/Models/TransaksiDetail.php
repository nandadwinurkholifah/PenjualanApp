<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\Transaksi;

class TransaksiDetail extends Model
{
    use HasFactory;
    protected $table = 'transaksi_detail';
    protected $primaryKey = 'kd_detail_transaksi';
    protected $fillable = [
        'kd_detail_transaksi',
        'no_faktur',
        'kd_produk',
        'jumlah',
        'harga',
    ];

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk','kd_produk');
    }

    public function transaksi()
    {
        return $this->belongsTo('App\Models\Transaksi','no_faktur','no_faktur');
    }
}

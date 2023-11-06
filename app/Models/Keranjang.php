<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $primaryKey = 'kd_keranjang';
    protected $fillable = [
        'username',
        'kd_produk',
        'jumlah',
        'harga',
    ];

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk','kd_produk');
    }
    
}

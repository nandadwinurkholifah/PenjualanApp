<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'kd_produk';
    protected $fillable = [
        'nama_produk',
        'kd_kategori',
        'harga',
        'gambar_produk',
        'stok',
    ];

    public function kategori(){
        return $this->belongsTo('App\Models\Kategori','kd_kategori');
    }
}

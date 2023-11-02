<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    use HasFactory;
    protected $table = 'agen';
    protected $primaryKey = 'kd_agen';
    protected $fillable = [
        'nama_toko',
        'nama_pemilik',
        'alamat',
        'latitude',
        'longitude',
        'gambar_toko',
    ];
}

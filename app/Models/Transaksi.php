<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Agen;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'kd_transaksi';
    protected $fillable = [
        'no_faktur',
        'tgl_penjualan',
        'kd_agen',
        'username',
        'total',
    ];

    public function agen()
    {
        return $this->belongsTo('App\Models\Agen','kd_agen');

    }

    public function getTglPenjualanAttribute()
    {
        return Carbon::parse($this->attributes['tgl_penjualan'])->format('d-F-Y');
    }
}

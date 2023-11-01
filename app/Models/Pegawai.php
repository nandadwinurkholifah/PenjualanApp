<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'pegawai';
    protected $primaryKey = 'username';
    protected $fillable = [
        'username',
        'password',
        'nama_pegawai',
        'jk',
        'alamat',
        'is_active'
    ];

    protected $keyTipe = 'string';
}

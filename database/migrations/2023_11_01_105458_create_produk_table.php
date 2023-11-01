<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->Increments('kd_produk');
            $table->unsignedInteger('kd_kategori');
            $table->string('nama_produk', 255);
            $table->integer('harga');
            $table->string('gambar_produk',255);
            $table->integer('stok');
            $table->foreign('kd_kategori')->references('kd_kategori')->on('kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk',function(Blueprint $table){
            $table->dropForeign(['kd_kategori']);                       
        });
        
        Schema::dropIfExists('produk');
    }
};

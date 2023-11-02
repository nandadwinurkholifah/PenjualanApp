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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->increments('kd_keranjang');
            $table->string('username',255);
            $table->foreign('username')->references('username')->on('pegawai');
            $table->unsignedInteger('kd_produk');
            $table->foreign('kd_produk')->references('kd_produk')->on('produk');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keranjang',function(Blueprint $table){
            $table->dropForeign(['username']);
            $table->dropForeign(['kd_produk']); 
        });
        Schema::dropIfExists('keranjang');
    }
};

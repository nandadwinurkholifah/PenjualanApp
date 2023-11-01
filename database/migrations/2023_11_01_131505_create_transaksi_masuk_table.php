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
        Schema::create('transaksi_masuk', function (Blueprint $table) {
            $table->increments('kd_transaksi_masuk');
            $table->unsignedInteger('kd_produk');
            $table->foreign('kd_produk')->references('kd_produk')->on('produk');
            $table->unsignedInteger('kd_supplier');
            $table->foreign('kd_supplier')->references('kd_supplier')->on('supplier');
            $table->date('tgl_transaksi');
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
        Schema::table('transaksi_masuk',function(Blueprint $table){
            $table->dropForeign(['kd_produk']);
            $table->dropForeign(['kd_supplier']); 
        });
        
        Schema::dropIfExists('transaksi_masuk');
    }
};

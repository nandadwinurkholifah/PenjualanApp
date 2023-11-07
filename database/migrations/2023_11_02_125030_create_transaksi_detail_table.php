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
        Schema::create('transaksi_detail', function (Blueprint $table) {
            $table->increments('kd_detail_transaksi');
            $table->string('no_faktur',100);
            $table->foreign('no_faktur')->references('no_faktur')->on('transaksi');
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
        Schema::table('transaksi_detail',function(Blueprint $table){
            $table->dropForeign(['no_faktur']);
            $table->dropForeign(['kd_produk']); 
        });
        Schema::dropIfExists('transaksi_detail');
    }
};

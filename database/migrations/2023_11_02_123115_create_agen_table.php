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
        Schema::create('agen', function (Blueprint $table) {
            $table->increments('kd_agen');
            $table->string('nama_toko',255);
            $table->string('nama_pemilik',255);
            $table->string('alamat',255);
            $table->string('latitude',255);
            $table->string('longitude',255);
            $table->string('gambar_toko',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agen');
    }
};

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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('username',100)->primary();
            $table->string('password',255);
            $table->string('nama_pegawai',255);
            $table->enum('jk',['PRIA','WANITA']);
            $table->string('alamat',255);
            $table->smallInteger('is_active',);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};

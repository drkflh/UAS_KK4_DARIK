<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('nik');
            $table->string('lok_antar');
            $table->time('jam_antar');
            $table->string('lok_balik');
            $table->time('jam_balik');
            $table->integer('id_mobil');
            $table->string('nama_mobil');
            $table->string('nopol_mobil');
            $table->integer('harga_sewa_mobil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
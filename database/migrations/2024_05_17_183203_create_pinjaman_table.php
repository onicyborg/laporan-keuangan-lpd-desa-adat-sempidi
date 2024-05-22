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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('besar_pendapatan');
            $table->integer('jangka_waktu');
            $table->unsignedBigInteger('jumlah_pinjaman');
            $table->string('tujuan_pinjaman');
            $table->unsignedBigInteger('pokok_perbulan');
            $table->float('bunga_perbulan');
            $table->unsignedBigInteger('total_bayar_perbulan');
            $table->string('jaminan');
            $table->unsignedBigInteger('sisa_pinjam');
            $table->string('status');
            $table->string('s_val')->nullable();
            $table->unsignedBigInteger('biaya_peminjaman');
            $table->string('no_pokok_nasabah');
            $table->timestamps();

            $table->foreign('no_pokok_nasabah')->references('no_pokok_nasabah')->on('nasabah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman');
    }
};

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
        Schema::create('angsuran', function (Blueprint $table) {
            $table->id();
            $table->string('no_pokok_nasabah');
            $table->unsignedBigInteger('pinjaman_id');
            $table->date('tanggal_bayar');
            $table->date('tanggal_tempo');
            $table->integer('pembayaran_ke');
            $table->float('pokok_perbulan');
            $table->float('bunga_perbulan');
            $table->float('total_bayar_perbulan');
            $table->float('denda');
            $table->timestamps();

            $table->foreign('no_pokok_nasabah')->references('no_pokok_nasabah')->on('nasabah');
            $table->foreign('pinjaman_id')->references('id')->on('pinjaman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angsuran');
    }
};

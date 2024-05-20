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
        Schema::create('simpanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saldo_awal');
            $table->unsignedBigInteger('jumlah_setoran');
            $table->unsignedBigInteger('jumlah_penarikan');
            $table->unsignedBigInteger('bunga');
            $table->unsignedBigInteger('saldo_akhir');
            $table->unsignedBigInteger('biaya_admin');
            $table->string('periode_sw')->nullable();
            $table->string('no_pokok_nasabah');
            $table->enum('jenis_transaksi', ['setoran', 'penarikan']);
            $table->enum('jenis_simpanan', ['simpan', 'pinjam']);
            $table->foreign('no_pokok_nasabah')->references('no_pokok_nasabah')->on('nasabah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpanan');
    }
};

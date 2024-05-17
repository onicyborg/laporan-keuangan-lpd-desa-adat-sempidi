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
            $table->date('tanggal_simpanan');
            $table->float('saldo_awal');
            $table->float('jumlah_setoran');
            $table->float('jumlah_penarikan');
            $table->float('bunga');
            $table->float('saldo_akhir');
            $table->float('biaya_admin');
            $table->string('jenis_simpanan');
            $table->string('periode_sw');
            $table->string('no_pokok_nasabah');
            $table->unsignedBigInteger('jenis_id');
            $table->foreign('no_pokok_nasabah')->references('no_pokok_nasabah')->on('nasabah');
            $table->foreign('jenis_id')->references('id')->on('jenis_simpanan');
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

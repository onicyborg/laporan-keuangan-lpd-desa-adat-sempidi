<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';
    protected $fillable = [
        'besar_pendapatan',
        'jangka_waktu',
        'jumlah_pinjaman',
        'tujuan_pinjaman',
        'pokok_perbulan',
        'bunga_perbulan',
        'total_bayar_perbulan',
        'jaminan',
        'sisa_pinjam',
        'status',
        's_val',
        'biaya_peminjaman',
        'no_pokok_nasabah',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'no_pokok_nasabah', 'no_pokok_nasabah');
    }
}

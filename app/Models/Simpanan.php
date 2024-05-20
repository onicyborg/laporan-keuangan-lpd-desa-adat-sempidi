<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;

    protected $table = 'simpanan';
    protected $fillable = [
        'saldo_awal',
        'jumlah_setoran',
        'jumlah_penarikan',
        'bunga',
        'saldo_akhir',
        'biaya_admin',
        'jenis_simpanan',
        'periode_sw',
        'no_pokok_nasabah',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'no_pokok_nasabah', 'no_pokok_nasabah');
    }

}

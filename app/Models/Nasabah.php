<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';

    protected $primaryKey = 'no_pokok_nasabah';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'no_pokok_nasabah',
        'nama_nasabah',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'telpon',
        'alamat',
        'no_ktp',
        'status_nasabah',
    ];

    public function simpanan()
    {
        return $this->hasMany(Simpanan::class, 'no_pokok_nasabah', 'no_pokok_nasabah');
    }

    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class, 'no_pokok_nasabah', 'no_pokok_nasabah');
    }
}

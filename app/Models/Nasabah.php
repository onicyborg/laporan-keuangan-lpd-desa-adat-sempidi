<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';

    protected $fillable = [
        'user_id',
        'nama_nasabah',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'telpon',
        'alamat',
        'no_ktp',
        'status_nasabah',
    ];
}
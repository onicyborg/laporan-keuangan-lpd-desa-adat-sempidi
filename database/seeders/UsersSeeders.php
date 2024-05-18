<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'karyawan1',
                'password' => Hash::make('karyawan1'),
                'level' => 'karyawan',
                'status_user' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'pimpinan1',
                'password' => Hash::make('pimpinan1'),
                'level' => 'pimpinan',
                'status_user' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('karyawan')->insert([
            [
                'nama_karyawan' => 'Karyawan 1',
                'tempat_lahir_karyawan' => 'Bandung',
                'tanggal_lahir_karyawan' => '2001-01-01',
                'telpon' => '081308130813',
                'alamat' => 'Bandung, Jawa Barat',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_karyawan' => 'Pimpinan 1',
                'tempat_lahir_karyawan' => 'Bandung',
                'tanggal_lahir_karyawan' => '2001-01-01',
                'telpon' => '081308130813',
                'alamat' => 'Bandung, Jawa Barat',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

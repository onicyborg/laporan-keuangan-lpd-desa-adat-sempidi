<?php

use App\Http\Controllers\AuthKaryawanController;
use App\Http\Controllers\AuthNasabahController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\SimpananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return view('Auth.welcome');
})->name('login');

Route::post('/login', [AuthKaryawanController::class, 'login']);

// Route::get('/registrasi', function(){
//     return view('Auth.registrasi');
// });

// Route::post('/registrasi-nasabah', [AuthNasabahController::class, 'registration']);

Route::group(['middleware' => 'level:karyawan'], function () {
    Route::get('/karyawan-dashboard', function(){
        return view('karyawan.welcome', ['title' => 'beranda']);
    });
    Route::get('/karyawan-data-master', [DataMasterController::class, 'index']);
    Route::post('/new-nasabah', [DataMasterController::class, 'registration']);
    Route::get('/detail-nasabah/{id}', [DataMasterController::class, 'detail_nasabah']);
    Route::put('/update-nasabah/{id}', [DataMasterController::class, 'update_nasabah']);

    Route::get('/karyawan-simpanan', [SimpananController::class, 'index'])->name('karyawan-simpanan');
    Route::post('/cari-nasabah', [SimpananController::class, 'search']);
    Route::post('/submit-simpanan', [SimpananController::class, 'store']);
    Route::get('/karyawan-cetak-simpanan/{id}', [SimpananController::class, 'print']);

    Route::get('/karyawan-penarikan', [PenarikanController::class, 'index'])->name('karyawan-penarikan');
    Route::post('/cari-nasabah-penarikan', [PenarikanController::class, 'search']);
    Route::post('/submit-penarikan', [PenarikanController::class, 'store']);
    Route::get('/karyawan-cetak-penarikan/{id}', [PenarikanController::class, 'print']);

    Route::get('/karyawan-pinjaman', [PinjamanController::class, 'index'])->name('karyawan-pinjaman');
    Route::post('/cari-nasabah-pinjaman', [PinjamanController::class, 'search']);
    Route::post('/submit-pinjaman', [PinjamanController::class, 'store']);
    Route::get('/karyawan-cetak-pinjaman/{id}', [PinjamanController::class, 'print']);

    Route::get('/karyawan-angsuran', function(){
        return view('karyawan.angsuran', ['title' => 'angsuran']);
    });
    Route::get('/karyawan-cetak-angsuran', function(){
        return view('karyawan.cetak.angsuran', ['title' => 'angsuran']);
    });
    
    Route::get('/karyawan-keuangan', function(){
        return view('karyawan.keuangan', ['title' => 'keuangan']);
    });
    Route::get('/karyawan-laporan', function(){
        return view('karyawan.laporan-jurnal-umum', ['title' => 'laporan']);
    });
    Route::get('/karyawan-laporan-buku-besar', function(){
        return view('karyawan.laporan-buku-besar', ['title' => 'laporan-buku-besar']);
    });
    Route::get('/karyawan-laporan-neraca-saldo', function(){
        return view('karyawan.laporan-neraca-saldo', ['title' => 'laporan-neraca-saldo']);
    });
    Route::get('/karyawan-laporan-perubahan-modal', function(){
        return view('karyawan.laporan-perubahan-modal', ['title' => 'laporan-perubahan-modal']);
    });
    Route::get('/karyawan-laporan-laba-rugi', function(){
        return view('karyawan.laporan-laba-rugi', ['title' => 'laporan-laba-rugi']);
    });
    Route::get('/karyawan-laporan-arus-kas', function(){
        return view('karyawan.laporan-arus-kas', ['title' => 'laporan-arus-kas']);
    });

    Route::get('/karyawan-logout', [AuthKaryawanController::class, 'logout']);
});

Route::group(['middleware' => 'level:pimpinan'], function () {
    Route::get('/pimpinan-dashboard', function(){
        return view('pimpinan.welcome', ['title' => 'dashboard']);
    });
    Route::get('/pimpinan-laporan', function(){
        return view('pimpinan.laporan-jurnal-umum', ['title' => 'laporan']);
    });
    Route::get('/pimpinan-laporan-buku-besar', function(){
        return view('pimpinan.laporan-buku-besar', ['title' => 'laporan-buku-besar']);
    });
    Route::get('/pimpinan-laporan-neraca-saldo', function(){
        return view('pimpinan.laporan-neraca-saldo', ['title' => 'laporan-neraca-saldo']);
    });
    Route::get('/pimpinan-laporan-perubahan-modal', function(){
        return view('pimpinan.laporan-perubahan-modal', ['title' => 'laporan-perubahan-modal']);
    });
    Route::get('/pimpinan-laporan-laba-rugi', function(){
        return view('pimpinan.laporan-laba-rugi', ['title' => 'laporan-laba-rugi']);
    });
    Route::get('/pimpinan-laporan-arus-kas', function(){
        return view('pimpinan.laporan-arus-kas', ['title' => 'laporan-arus-kas']);
    });
    Route::get('/pimpinan-logout', [AuthKaryawanController::class, 'logout']);
});

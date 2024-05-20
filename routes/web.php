<?php

use App\Http\Controllers\AuthKaryawanController;
use App\Http\Controllers\AuthNasabahController;
use App\Http\Controllers\DataMasterController;
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
    Route::get('/karyawan-simpanan', function(){
        return view('karyawan.simpanan', ['title' => 'simpanan']);
    });
    Route::get('/karyawan-penarikan', function(){
        return view('karyawan.penarikan', ['title' => 'penarikan']);
    });
    Route::get('/karyawan-pinjaman', function(){
        return view('karyawan.pinjaman', ['title' => 'pinjaman']);
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

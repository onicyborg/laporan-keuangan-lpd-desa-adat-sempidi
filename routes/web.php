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
    Route::get('/karyawan-logout', [AuthKaryawanController::class, 'logout']);
});

Route::group(['middleware' => 'level:pimpinan'], function () {
    Route::get('/pimpinan-dashboard', function(){
        return view('pimpinan.welcome');
    });
    Route::get('/pimpinan-logout', [AuthKaryawanController::class, 'logout']);
});

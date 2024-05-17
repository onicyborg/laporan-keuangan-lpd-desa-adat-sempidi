<?php

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

Route::get('/registrasi', function(){
    return view('Auth.registrasi');
});

Route::group(['middleware' => 'role:karyawan'], function () {

});

Route::group(['middleware' => 'role:nasabah'], function () {

});

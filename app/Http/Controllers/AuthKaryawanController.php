<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthKaryawanController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input dengan pesan error custom
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Data login
        $credentials = $request->only('username', 'password');

        // Coba lakukan autentikasi
        if (Auth::attempt($credentials, $request->has('remember_me'))) {
            // Autentikasi berhasil, redirect ke halaman dashboard atau halaman lain yang sesuai
            if(Auth::user()->level == 'karyawan'){
                return redirect()->intended('/karyawan-dashboard')->with('success', 'Login berhasil!');
            }else if(Auth::user()->level == 'pimpinan'){
                return redirect()->intended('/pimpinan-dashboard')->with('success', 'Login berhasil!');
            }else{
                Auth::logout();
                return redirect()->intended('/dashboard')->with('Login Gagal', 'Level Tidak Terdaftar!')->withInput($request->except('password'));
            }
        }

        // Autentikasi gagal, kembali ke halaman login dengan error
        return redirect()->back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->except('password'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function index()
    {
        $data = Pinjaman::latest()->get();

        return view('karyawan.pinjaman', ['data' => $data, 'title' => 'pinjaman']);
    }

    public function search(Request $request)
    {
        $data = Pinjaman::latest()->get();

        $request->validate([
            'no_pokok_nasabah' => 'required',
        ]);

        $data_nasabah = Nasabah::find($request->no_pokok_nasabah);

        if (!$data_nasabah) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('karyawan.pinjaman', ['data_nasabah' => $data_nasabah, 'title' => 'penarikan', 'data' => $data]);
    }
}

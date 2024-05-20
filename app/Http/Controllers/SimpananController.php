<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function search(Request $request)
    {
        $data = Simpanan::latest()->get();

        $request->validate([
            'no_pokok_nasabah' => 'required',
        ]);

        $data_nasabah = Nasabah::find($request->no_pokok_nasabah);

        if (!$data_nasabah) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('karyawan.simpanan', ['data_nasabah' => $data_nasabah, 'title' => 'simpanan', 'data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_pokok_nasabah' => 'required',
            'nominal_setoran' => 'required|numeric', // Pastikan nominal_setoran adalah angka
        ]);

        $setoran_terakhir = Simpanan::where('no_pokok_nasabah', $request->no_pokok_nasabah)->latest()->first();

        $setoran = new Simpanan();

        $setoran->saldo_awal = $setoran_terakhir->saldo_akhir;
        $setoran->jumlah_setoran = $request->nominal_setoran;
        $setoran->jumlah_penarikan = 0;
        $setoran->bunga = 0; //JANGAN LUPA DI GANTI
        $setoran->saldo_akhir = $setoran_terakhir->saldo_akhir + $request->nominal_setoran;
        $setoran->biaya_admin = 0; //JANGAN LUPA DI GANTI
        $setoran->jenis_simpanan = 'simpan';
        $setoran->jenis_transaksi = 'setoran';
        $setoran->no_pokok_nasabah = $request->no_pokok_nasabah;

        if($setoran->save()){
            return redirect('karyawan-simpanan')->with('success', 'Setoran berhasil di submit');
        }else{
            return redirect()->back()->with('error', 'Setoran gagal di submit');
        }
    }

    public function index()
    {
        $data = Simpanan::where('jenis_transaksi', 'setoran')->latest()->get();

        return view('karyawan.simpanan', ['data' => $data, 'title' => 'simpanan']);
    }
}

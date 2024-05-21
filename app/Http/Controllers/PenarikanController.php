<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PenarikanController extends Controller
{
    public function index()
    {
        $data = Simpanan::where('jenis_transaksi', 'penarikan')->latest()->get();

        return view('karyawan.penarikan', ['data' => $data, 'title' => 'penarikan']);
    }

    public function search(Request $request)
    {
        $data = Simpanan::where('jenis_transaksi', 'penarikan')->latest()->get();

        $request->validate([
            'no_pokok_nasabah' => 'required',
        ]);

        $data_nasabah = Nasabah::find($request->no_pokok_nasabah);

        if (!$data_nasabah) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('karyawan.penarikan', ['data_nasabah' => $data_nasabah, 'title' => 'penarikan', 'data' => $data]);
    }

    public function store(Request $request)
    {

        $transaksi_terakhir = Simpanan::where('no_pokok_nasabah', $request->no_pokok_nasabah)->latest()->first();

        $setoran = new Simpanan();

        $setoran->saldo_awal = $transaksi_terakhir->saldo_akhir;
        $setoran->jumlah_setoran = 0;
        $setoran->jumlah_penarikan = $request->nominal_penarikan;
        $setoran->bunga = 0; //JANGAN LUPA DI GANTI
        $setoran->saldo_akhir = $transaksi_terakhir->saldo_akhir - $request->nominal_penarikan;
        $setoran->biaya_admin = 0; //JANGAN LUPA DI GANTI
        $setoran->jenis_simpanan = 'simpan';
        $setoran->jenis_transaksi = 'penarikan';
        $setoran->no_pokok_nasabah = $request->no_pokok_nasabah;

        if($setoran->save()){
            return redirect('karyawan-penarikan')->with('success', 'Penarikan berhasil di submit');
        }else{
            return redirect()->back()->with('error', 'Penarikan gagal di submit');
        }
    }

    public function print($id)
    {
        $data = Simpanan::find($id);

        return view('karyawan.cetak.penarikan', ['data' => $data, 'title' => 'penarikan']);
    }
}

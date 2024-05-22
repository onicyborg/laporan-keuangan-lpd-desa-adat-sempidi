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

    public function store(Request $request)
    {
        $hasPendingLoan = Pinjaman::where('no_pokok_nasabah', $request->no_pokok_nasabah)
            ->where('status', 'menunggu_konfirmasi')
            ->exists();

        if ($hasPendingLoan) {
            return redirect('karyawan-pinjaman')->with('error', 'Nasabah ini memiliki pengajuan pinjaman yang belum dikonfirmasi');
        }

        $pinjaman = new Pinjaman();

        $pinjaman->besar_pendapatan = $request->besar_pendapatan;
        $pinjaman->jangka_waktu = $request->jangka_waktu;
        $pinjaman->jumlah_pinjaman = $request->jumlah_pinjaman;
        $pinjaman->tujuan_pinjaman = $request->tujuan_pinjaman;
        $pinjaman->pokok_perbulan = 0;
        $pinjaman->bunga_perbulan = $request->bunga_perbulan;
        $pinjaman->total_bayar_perbulan = $request->total_bayar_perbulan;
        $pinjaman->jaminan = $request->jaminan;
        $pinjaman->sisa_pinjam = 0;
        $pinjaman->status = 'menunggu_konfirmasi';
        $pinjaman->biaya_peminjaman = $request->biaya_peminjaman;
        $pinjaman->no_pokok_nasabah = $request->no_pokok_nasabah;


        if ($pinjaman->save()) {
            return redirect('karyawan-pinjaman')->with('success', 'Data pinjaman berhasil disubmit, menunggu konfirmasi pimpinan');
        } else {
            return redirect('karyawan-pinjaman')->with('error', 'Data pinjaman gagal disubmit');
        }
    }

    public function print($id)
    {
        $data = Pinjaman::find($id);

        return view('karyawan.cetak.pinjaman', ['data' => $data, 'title' => 'pinjaman']);
    }
}

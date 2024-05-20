<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class DataMasterController extends Controller
{
    public function registration(Request $request)
    {
        $request->validate([
            'nama_nasabah' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'date|required',
            'pekerjaan' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required',
            'setoran' => 'required'
        ],[
            'nama_nasabah.required' => 'Nama Nasabah Wajib Diisi',
            'tempat_lahir.required' => 'Tempat Lahir Nasabah Wajib Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Nasabah Wajib Diisi',
            'pekerjaan.required' => 'Pekerjaan Nasabah Wajib Diisi',
            'telpon.required' => 'Nomor Telpon Nasabah Wajib Diisi',
            'alamat.required' => 'Alamat Nasabah Wajib Diisi',
            'no_ktp.required' => 'Nomor KTP Nasabah Wajib Diisi',
            'setoran.required' => 'Setoran Wajib Ke-1 Wajib Diisi',
        ]);

        $nasabah = new Nasabah();
        $setoran = new Simpanan();

        do {
            $uniqueNumber = random_int(100000000000, 999999999999);
        } while (Nasabah::where('no_pokok_nasabah', $uniqueNumber)->exists());

        $nasabah->no_pokok_nasabah = $uniqueNumber;
        $nasabah->nama_nasabah = $request->nama_nasabah;
        $nasabah->tempat_lahir = $request->tempat_lahir;
        $nasabah->tanggal_lahir = $request->tanggal_lahir;
        $nasabah->pekerjaan = $request->pekerjaan;
        $nasabah->telpon = $request->telpon;
        $nasabah->alamat = $request->alamat;
        $nasabah->no_ktp = $request->no_ktp;

        $setoran->saldo_awal = 0;
        $setoran->jumlah_setoran = $request->setoran;
        $setoran->jumlah_penarikan = 0;
        $setoran->bunga = 0;
        $setoran->saldo_akhir = $request->setoran;
        $setoran->biaya_admin = 0;
        $setoran->jenis_simpanan = 'simpan';
        $setoran->jenis_transaksi = 'setoran';
        $setoran->no_pokok_nasabah = $uniqueNumber;

        if($nasabah->save() && $setoran->save()){
            return redirect()->back()->with('success', 'Berhasil Menyimpan Data Nasabah Baru');
        }else{
            return redirect()->back()->with('error', 'Gagal Menyimpan Data Nasabah Baru');
        }
    }

    public function index()
    {
        $nasabahs = Nasabah::all();

        return view('karyawan.data-master', ['nasabahs' => $nasabahs, 'title' => 'data-master']);
    }

    public function detail_nasabah($id)
    {
        $data = Nasabah::where('no_pokok_nasabah', $id)->first();

        return view('karyawan.detail-data-master', ['data' => $data, 'title' => 'data-master']);
    }

    public function update_nasabah(Request $request, $id)
{
    $request->validate([
        'nama_nasabah' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'date|required',
        'pekerjaan' => 'required',
        'telpon' => 'required',
        'alamat' => 'required',
        'no_ktp' => 'required',
    ],[
        'nama_nasabah.required' => 'Nama Nasabah Wajib Diisi',
        'tempat_lahir.required' => 'Tempat Lahir Nasabah Wajib Diisi',
        'tanggal_lahir.required' => 'Tanggal Lahir Nasabah Wajib Diisi',
        'pekerjaan.required' => 'Pekerjaan Nasabah Wajib Diisi',
        'telpon.required' => 'Nomor Telpon Nasabah Wajib Diisi',
        'alamat.required' => 'Alamat Nasabah Wajib Diisi',
        'no_ktp.required' => 'Nomor KTP Nasabah Wajib Diisi',
    ]);

    $data = Nasabah::where('no_pokok_nasabah', $id)->first();

    if ($data) {
        $data->nama_nasabah = $request->nama_nasabah;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->pekerjaan = $request->pekerjaan;
        $data->telpon = $request->telpon;
        $data->alamat = $request->alamat;
        $data->no_ktp = $request->no_ktp;

        if ($data->save()) {
            return redirect()->back()->with('success', 'Berhasil Memperbarui Data Nasabah');
        } else {
            return redirect()->back()->with('error', 'Gagal Memperbarui Data Nasabah');
        }
    } else {
        return redirect()->back()->with('error', 'Nasabah tidak ditemukan');
    }
}

}

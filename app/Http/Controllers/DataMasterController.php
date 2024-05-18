<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
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
        ],[
            'nama_nasabah.required' => 'Nama Nasabah Wajib Diisi',
            'tempat_lahir.required' => 'Tempat Lahir Nasabah Wajib Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Nasabah Wajib Diisi',
            'pekerjaan.required' => 'Pekerjaan Nasabah Wajib Diisi',
            'telpon.required' => 'Nomor Telpon Nasabah Wajib Diisi',
            'alamat.required' => 'Alamat Nasabah Wajib Diisi',
            'no_ktp.required' => 'Nomor KTP Nasabah Wajib Diisi',
        ]);

        $nasabah = new Nasabah();

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

        if($nasabah->save()){
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
}

@extends('karyawan.layout.master')
@section('title')
    Dashboard Karyawan
@endsection

@section('judul')
    Cetak Penarikan
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="row align-items-center">
                <div class="d-flex col-md-12 justify-content-center">
                    <img src="https://ugc.production.linktr.ee/035a976e-1d03-4e1d-8abf-0af33a816aae_Logo-LPD--Logo-Lembaga-Perkreditan-Desa-.png"
                        alt="logo-lpd-sempidi" style="width: 100px" class="mb-3">
                </div>
                <div class="col-md-12 text-center">
                    <h2>LPD SEMPIDI</h2>
                    <p>Desa Adat Sempidi, Kecamatan Mengwi, Kabupaten Badung, Lingkungan Sempidi</p>
                    <h4>Data Penarikan</h4>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="row">
                    <p class="col-3">No Pokok Nasabah</p>
                    <p class="col-1">:</p>
                    <p class="col-8">001</p>
                </div>
                <div class="row">
                    <p class="col-3">Nama Nasabah Nasabah</p>
                    <p class="col-1">:</p>
                    <p class="col-8">Fajrin Nurhakim</p>
                </div>
                <div class="row">
                    <p class="col-3">Alamat</p>
                    <p class="col-1">:</p>
                    <p class="col-8">Swakarsa</p>
                </div>
                <div class="row">
                    <p class="col-3">Saldo</p>
                    <p class="col-1">:</p>
                    <p class="col-8">Rp. 2.000.000</p>

                </div>
                <div class="row">
                    <p class="col-3">Tanggal Penarikan</p>
                    <p class="col-1">:</p>
                    <p class="col-8">01-01-2024</p>
                </div>
                <div class="row">
                    <p class="col-3">Nominal Penarikan Simpanan</p>
                    <p class="col-1">:</p>
                    <p class="col-8">Rp. 2.000.000</p>
                </div>
                <div class="row">
                    <p class="col-3">Saldo Awal</p>
                    <p class="col-1">:</p>
                    <p class="col-8">Rp. 4.000.000</p>
                </div>
                <div class="row">
                    <p class="col-3">Saldo Akhir</p>
                    <p class="col-1">:</p>
                    <p class="col-8">Rp. 2.000.000</p>
                </div>
            </div>
        @endsection

        @push('styles')
            <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
            <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
            <style>

            </style>
        @endpush

        @push('scripts')
            <script></script>
        @endpush

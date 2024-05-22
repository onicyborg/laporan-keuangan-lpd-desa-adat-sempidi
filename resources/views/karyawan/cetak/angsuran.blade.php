@extends('karyawan.layout.master')
@section('title')
    Dashboard Karyawan
@endsection

@section('judul')
    Cetak Angsuran Pinjaman
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y" id="divToExport">
        <div class="card p-3">
            <div class="row align-items-center">
                <div class="d-flex col-md-12 justify-content-center">
                    <img src="{{ asset('assets/img/logo/logo_sempidi.png') }}" alt="logo-lpd-sempidi" style="width: 100px"
                        class="mb-3">
                </div>
                <div class="col-md-12 text-center">
                    <h2>LPD SEMPIDI</h2>
                    <p>Desa Adat Sempidi, Kecamatan Mengwi, Kabupaten Badung, Lingkungan Sempidi</p>
                    <h4>Data Angsuran Pinjaman</h4>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="row">
                    <p class="col-7">No Pokok Nasabah</p>
                    <p class="col-1">:</p>
                    <p class="col-4">001</p>
                </div>
                <div class="row">
                    <p class="col-7">Nama Nasabah</p>
                    <p class="col-1">:</p>
                    <p class="col-4">Fajrin Nurhakim</p>
                </div>
                <div class="row">
                    <p class="col-7">Alamat</p>
                    <p class="col-1">:</p>
                    <p class="col-4">Swakarsa</p>
                </div>
                <div class="row">
                    <p class="col-7">Sisa Pokok Setoran</p>
                    <p class="col-1">:</p>
                    <p class="col-4">Rp. 2.000.000</p>
                </div>
                <div class="row">
                    <p class="col-7">ID Pembayaran</p>
                    <p class="col-1">:</p>
                    <p class="col-4">002</p>
                </div>
                <div class="row">
                    <p class="col-7">Tanggal Bayar</p>
                    <p class="col-1">:</p>
                    <p class="col-4">01-01-2024</p>
                </div>
                <div class="row">
                    <p class="col-7">Jumlah Pinjaman</p>
                    <p class="col-1">:</p>
                    <p class="col-4">Rp. 4.000.000</p>
                </div>
                <div class="row">
                    <p class="col-7">Jangka Waktu</p>
                    <p class="col-1">:</p>
                    <p class="col-4">3 Bulan</p>
                </div>
                <div class="row">
                    <p class="col-7">Total Pokok Setoran Liburan</p>
                    <p class="col-1">:</p>
                    <p class="col-4">Rp. 2.000.000</p>
                </div>
                <div class="row">
                    <p class="col-7">Bunga Perbulan</p>
                    <p class="col-1">:</p>
                    <p class="col-4">1 %</p>
                </div>
                <div class="row">
                    <p class="col-7">Denda</p>
                    <p class="col-1">:</p>
                    <p class="col-4">Rp. 0</p>
                </div>
                <div class="row">
                    <p class="col-7">Total Bayar</p>
                    <p class="col-1">:</p>
                    <p class="col-4">Rp. 1.000.000</p>
                </div>
                <div class="row">
                    <p class="col-7">Pembayaran Ke-</p>
                    <p class="col-1">:</p>
                    <p class="col-4">2</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl ">
        <button id="exportButton" class="btn btn-primary ">Export to PDF</button>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <style>

    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        document.getElementById('exportButton').addEventListener('click', function() {
            // Elemen yang ingin diekspor
            var element = document.getElementById('divToExport');

            // Opsi konfigurasi html2pdf
            var opt = {
                margin: 1,
                filename: 'document.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            // Pastikan semua gambar telah dimuat sepenuhnya
            var images = element.getElementsByTagName('img');
            var totalImages = images.length;
            var loadedImages = 0;

            for (var i = 0; i < totalImages; i++) {
                images[i].addEventListener('load', function() {
                    loadedImages++;
                    if (loadedImages === totalImages) {
                        // Ekspor elemen ke PDF ketika semua gambar telah dimuat
                        html2pdf().set(opt).from(element).save();
                    }
                });

                // Tambahkan pengecekan jika gambar sudah dimuat sebelumnya
                if (images[i].complete) {
                    loadedImages++;
                    if (loadedImages === totalImages) {
                        // Ekspor elemen ke PDF ketika semua gambar telah dimuat
                        html2pdf().set(opt).from(element).save();
                    }
                }
            }

            // Jika tidak ada gambar, langsung lakukan ekspor
            if (totalImages === 0) {
                html2pdf().set(opt).from(element).save();
            }
        });
    </script>
@endpush

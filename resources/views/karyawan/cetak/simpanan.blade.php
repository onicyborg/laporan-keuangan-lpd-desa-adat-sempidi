@extends('karyawan.layout.master')
@section('title')
    Dashboard Karyawan
@endsection

@section('judul')
    Cetak Simpanan
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y" id="divToExport">
        <div class="card p-3">
            <div class="row align-items-center">
                <div class="d-flex col-md-12 justify-content-center">
                    <img src="{{ asset('assets/img/logo/logo_sempidi.png') }}"
                        alt="logo-lpd-sempidi" style="width: 100px" class="mb-3">
                </div>
                <div class="col-md-12 text-center">
                    <h2>LPD SEMPIDI</h2>
                    <p>Desa Adat Sempidi, Kecamatan Mengwi, Kabupaten Badung, Lingkungan Sempidi</p>
                    <h4>Data Simpanan</h4>
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
                    <p class="col-3">Tanggal Simpanan</p>
                    <p class="col-1">:</p>
                    <p class="col-8">01-01-2024</p>
                </div>
                <div class="row">
                    <p class="col-3">Nominal Setoran</p>
                    <p class="col-1">:</p>
                    <p class="col-8">Rp. 2.000.000</p>
                </div>
                <div class="row">
                    <p class="col-3">Jenis Setoran</p>
                    <p class="col-1">:</p>
                    <p class="col-8">Tunai</p>
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
        </div>
    </div>

    <button id="exportButton">Export to PDF</button>
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
                margin:       1,
                filename:     'document.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
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

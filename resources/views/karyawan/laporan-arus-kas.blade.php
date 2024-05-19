@extends('karyawan.layout.master')

@section('title')
    Dashboard Karyawan
@endsection

@section('judul')
    Laporan Jurnal Umum
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <h5 class="card-title">Laporan Jurnal Umum</h5>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="col-md-12 d-flex align-items-center justify-content-between mb-3">
                                    <div class="col-md-2">
                                        <label for="form-label">Tanggal</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" />
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" />
                                    </div>
                                    <button class="btn btn-primary"><i class="bx bx-search fs-4 lh-0"></i>cari</button>
                                    <button class="btn btn-primary"><i class="bx bx-refresh fs-4 lh-0"></i>batal</button>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-2 d-flex align-items-center">
                                    <img src="https://ugc.production.linktr.ee/035a976e-1d03-4e1d-8abf-0af33a816aae_Logo-LPD--Logo-Lembaga-Perkreditan-Desa-.png"
                                        alt="logo-lpd-sempidi" style="width: 120px">
                                </div>
                                <div class="col-md-8 text-center">
                                    <h2>LPD SEMPIDI</h2>
                                    <p>Desa Adat Sempidi, Kecamatan Mengwi, Kabupaten Badung, Lingkungan Sempidi</p>
                                    <hr>
                                    <h4>Jurnal Umum</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-4 order-0">
                                    <div class="card shadow-none">
                                        <div class="d-flex align-items-end row">
                                            <div class="card-body">
                                                <table class="display table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Aktivitas Operasional</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Biaya Listrik</td>
                                                            <td>Rp. 30.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kas</td>
                                                            <td>Rp. 30.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Biaya Sewa Toko</td>
                                                            <td>Rp. 35.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kas</td>
                                                            <td>Rp. 35.000</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Arus Kas Aktivitas Operasional</th>
                                                            <th>Rp. 130.000</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-4 order-0">
                                    <div class="card shadow-none">
                                        <div class="d-flex align-items-end row">
                                            <div class="card-body">
                                                <table class="display table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Aktivitas Pendanaan</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Biaya Listrik</td>
                                                            <td>Rp. 30.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kas</td>
                                                            <td>Rp. 30.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Biaya Sewa Toko</td>
                                                            <td>Rp. 35.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kas</td>
                                                            <td>Rp. 35.000</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Arus Kas Aktivitas Operasional</th>
                                                            <th>Rp. 130.000</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-4 order-0">
                                    <div class="card shadow-none">
                                        <div class="d-flex align-items-end row">
                                            <div class="card-body">
                                                <table class="display table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Kenaikan Kas</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Posisi Kas 1/2/2024</td>
                                                            <td>Rp. 30.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Posisi Kas 30/2/2024</td>
                                                            <td>Rp. 60.000</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Kenaikan Kas</th>
                                                            <th>Rp. 30.000</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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

        <script src="{{ asset('assets/js/swal.min.js') }}"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script>
            new DataTable('#example');

            document.getElementById('cancelButton').addEventListener('click', function() {
                document.getElementById('formAuthentication').reset();
            });
        </script>

        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>
        @endif
    @endpush

@extends('karyawan.layout.master')

@section('title')
    Dashboard Karyawan
@endsection

@section('judul')
    Laporan Laba Rugi
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <h5 class="card-title">Laporan Laba Rugi</h5>
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
                                    <button class="btn btn-primary"><i class="bx bx-printer fs-4 lh-0"></i>cetak</button>
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
                                    <h4>Laporan Laba Rugi</h4>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="p-2">
                                    <div class="row">
                                        <div class="col-md-4">Pendapatan</div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">Pendapatan Simpan Pinjam</div>
                                        <div class="col-md-4">Rp. 142.500.000</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">Pendapatan Bunga</div>
                                        <div class="col-md-4">Rp. 7.500.000</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">Jumlah Pendapatan</div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">Rp. 7.500.000</div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">Pengeluaran</div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">Biaya Umum</div>
                                        <div class="col-md-4">Rp. 142.500.000</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">Penyusutan</div>
                                        <div class="col-md-4">Rp. 7.500.000</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">Jumlah Pendapatan</div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">Rp. 7.500.000</div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">Pendapatan Kotor</div>
                                        <div class="col-md-4">Rp. 17.500.000</div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">SHU Dibagikan</div>
                                        <div class="col-md-4">Rp. 7.500.000</div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">SHU Ditahan</div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">Rp. 10.000.000</div>
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

@extends('karyawan.layout.master')

@section('title')
    Dashboard Karyawan
@endsection

@section('judul')
    Data Setoran Simpanan
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <h5 class="card-title">Data Setoran Simpanan</h5>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="col-md-3">
                                    <label for="form-label">No Pokok Nasabah</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" />
                                </div>
                                <button class="btn btn-primary">
                                    <span><i class="bx bx-search fs-4 lh-0"></i> Cari</span>
                                </button>
                            </div>
                            <hr>
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <p class="col-md-4">No Pokok Nasabah</p>
                                    <p class="col-md-4">: <span>1910101101000</span></p>
                                </div>
                                <div class="d-flex">
                                    <p class="col-4">Nama Nasabah</p>
                                    <p class="col-md-4">: <span>Akhmad Fauzi</span></p>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Alamat</p>
                                    <p class="col-md-4">: <span>Jakarta Selatan</span></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="col-md-4">
                                        <label for="form-label">Tanggal Simpanan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" />
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="col-md-4">
                                        <label for="form-label">Jenis Simpanan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select id="largeSelect" class="form-select form-select">
                                            <option>Select</option>
                                            <option value="1">Simpanan Wajib</option>
                                            <option value="2">Simpanan Sunah</option>
                                            <option value="3">Simpanan Makruh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div>
                                        <button class="btn btn-primary"><i
                                                class="bx bx-refresh fs-4 lh-0"></i>batal</button>
                                        <button class="btn btn-primary"><i class="bx bx-save fs-4 lh-0"></i>simpan</button>
                                        <button class="btn btn-primary"><i
                                                class="bx bx-printer fs-4 lh-0"></i>cetak</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 mb-4 order-0">
                                        <div class="card">
                                            <div class="d-flex align-items-end row">
                                                <div class="card-body">
                                                    <h5 class="card-title">List Data Nasabah</h5>
                                                    <table id="example" class="display" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tanggal</th>
                                                                <th>ID PN</th>
                                                                <th>Nama Nasabah</th>
                                                                <th>Jenis Setoran</th>
                                                                <th>Saldo Awal</th>
                                                                <th>Jumalh Setoran</th>
                                                                <th>Saldo Akhir</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>No</td>
                                                                <td>Tanggal</td>
                                                                <td>ID PN</td>
                                                                <td>Nama Nasabah</td>
                                                                <td>Jenis Setoran</td>
                                                                <td>Saldo Awal</td>
                                                                <td>Jumalh Setoran</td>
                                                                <td>Saldo Akhir</td>
                                                                <td><a href="/detail-nasabah/"
                                                                        class="btn btn-icon btn-outline-secondary btn-sm">
                                                                        <span class="tf-icons bx bx-search-alt"></span>
                                                                    </a></td>
                                                            </tr>

                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tanggal</th>
                                                                <th>ID PN</th>
                                                                <th>Nama Nasabah</th>
                                                                <th>Jenis Setoran</th>
                                                                <th>Saldo Awal</th>
                                                                <th>Jumalh Setoran</th>
                                                                <th>Saldo Akhir</th>
                                                                <th>Aksi</th>
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

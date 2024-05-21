@extends('karyawan.layout.master')

@section('title')
    Dashboard Karyawan
@endsection

@section('judul')
    Data Angsuran Pembayaran
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <h5 class="card-title">Data Angsuran Pembayaran</h5>
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
                                <div class="d-flex">
                                    <p class="col-md-4">Sisa Pokok Pinjaman</p>
                                    <p class="col-md-4">: <span>Rp. 1.000.000</span></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="col-md-4">
                                        <label for="form-label">ID Pembayaran</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select id="largeSelect" class="form-select form-select">
                                            <option>Select</option>
                                            <option value="1">10</option>
                                            <option value="2">12</option>
                                            <option value="3">13</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Tanggal bayar</p>
                                    <p class="col-md-4">: <span>02/02/2021</span></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <p class="col-md-4">Jumlah Pinjaman</p>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control mb-3" />
                                    </div>
                                </div>
                                <div class="d-flex d-flex align-items-center justify-content-between mb-3">
                                    <p class="col-md-4">Jangka Waktu</p>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control mb-3" />
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Total Pokok Setoran Liburan</p>
                                    <p class="col-md-4">: <span>Rp. 1.000.000</span></p>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Bunga Perbulan</p>
                                    <p class="col-md-4">: <span>1 %</span></p>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Denda</p>
                                    <p class="col-md-4">: <span>Rp. 0</span></p>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Total Bayar</p>
                                    <p class="col-md-4">: <span>Rp. 1.030.000</span></p>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Pembayaran Ke-</p>
                                    <p class="col-md-4">: <span>1</span></p>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div>
                                        <button class="btn btn-primary"><i
                                                class="bx bx-refresh fs-4 lh-0"></i>batal</button>
                                        <button class="btn btn-primary"><i class="bx bx-save fs-4 lh-0"></i>simpan</button>
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
                                                                <th>ID Nasabah</th>
                                                                <th>Pembayaran Ke-</th>
                                                                <th>Jumlah Bayar</th>
                                                                <th>Denda</th>
                                                                <th>Sisa Pinjaman</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>02/02/2024</td>
                                                                <td>0002</td>
                                                                <td>1</td>
                                                                <td>Rp. 1.030.000</td>
                                                                <td>Rp. 0</td>
                                                                <td>Rp. 2.000.000</td>
                                                                <td><a href="/karyawan-cetak-pinjaman"
                                                                        class="btn btn-icon btn-outline-secondary btn-sm">
                                                                        <span class="tf-icons bx bx-printer"></span>
                                                                    </a></td>
                                                            </tr>

                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tanggal</th>
                                                                <th>ID Nasabah</th>
                                                                <th>Pembayaran Ke-</th>
                                                                <th>Jumlah Bayar</th>
                                                                <th>Denda</th>
                                                                <th>Sisa Pinjaman</th>
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

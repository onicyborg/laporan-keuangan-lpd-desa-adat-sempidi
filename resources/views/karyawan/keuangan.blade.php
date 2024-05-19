@extends('karyawan.layout.master')

@section('title')
    Dashboard Karyawan
@endsection

@section('judul')
    Data Keuangan
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <h5 class="card-title">Data Keuangan</h5>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="col-md-3">
                                    <label for="form-label">ID Jurnal</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="col-md-3">
                                    <label for="form-label">Nama</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-4 order-0">
                                    <div class="card shadow-none">
                                        <div class="d-flex align-items-end row">
                                            <div class="card-body">
                                                <table id="example" class="display" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Akun</th>
                                                            <th>Debit</th>
                                                            <th>Kredit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Bunga Pinjaman</td>
                                                            <td>30.000</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Hutang Pinjaman</td>
                                                            <td></td>
                                                            <td>30.000</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th></th>
                                                            <th>
                                                                <select id="largeSelect" class="form-select form-select">
                                                                    <option>Select</option>
                                                                    <option value="1">Modal Usaha</option>
                                                                    <option value="2">Modal Ngutang</option>
                                                                    <option value="3">Modal Nagih</option>
                                                                </select>
                                                            </th>
                                                            <th>Rp. 30.000</th>
                                                            <th>Rp. 30.000</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-7 d-flex align-items-center justify-content-end mb-3">
                                    <div class="col-md-6">
                                        <label for="form-label">Tanggal</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex align-items-center justify-content-end mb-3">
                                    <div class="col-md-6">
                                        <label for="form-label">Keterangan</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex align-items-center justify-content-end">
                                    <div class="col-md-6">
                                        <label for="form-label">Out Of Balance</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-end mt-3">
                                    <div>
                                        <button class="btn btn-primary"><i
                                                class="bx bx-refresh fs-4 lh-0"></i>batal</button>
                                        <button class="btn btn-primary"><i
                                                class="bx bx-printer fs-4 lh-0"></i>simpan</button>
                                    </div>
                                </div>
                                <hr>
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

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
                            <form action="/cari-nasabah-pinjaman" method="post">
                                @csrf
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="col-md-3">
                                        <label for="form-label">No Pokok Nasabah</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="no_pokok_nasabah" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <span><i class="bx bx-search fs-4 lh-0"></i> Cari</span>
                                    </button>
                                </div>
                            </form>
                            <hr>
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <p class="col-md-4">No Pokok Nasabah</p>
                                    <p class="col-md-4">: <span>@isset($data_nasabah) {{ $data_nasabah->no_pokok_nasabah }} @endisset</span></p>
                                </div>
                                <div class="d-flex">
                                    <p class="col-4">Nama Nasabah</p>
                                    <p class="col-md-4">: <span>@isset($data_nasabah) {{ $data_nasabah->nama_nasabah }} @endisset</span></p>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Alamat</p>
                                    <p class="col-md-4">: <span>@isset($data_nasabah) {{ $data_nasabah->alamat }} @endisset</span></p>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Tanggal Pengajuan Pinjaman</p>
                                    <p class="col-md-4">: <span>{{ date('d-m-Y') }}</span></p>
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
                                        <select id="largeSelect" class="form-select form-select">
                                            <option selected disabled>- Pilih Jangka Waktu -</option>
                                            <option value="3">3 Bulan</option>
                                            <option value="6">6 Bulan</option>
                                            <option value="12">12 Bulan</option>
                                            <option value="24">24 Bulan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Total Pokok Setoran Liburan</p>
                                    <p class="col-md-4">: <span>Rp. 0</span></p>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Bunga Perbulan</p>
                                    <p class="col-md-4">: <span>2 %</span></p>
                                </div>
                                <div class="d-flex">
                                    <p class="col-md-4">Total Bayar Perbulan</p>
                                    <p class="col-md-4">: <span>Rp. 1.030.000</span></p>
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
                                                                <th>Nominal Pinjaman</th>
                                                                <th>Status Pinjaman</th>
                                                                <th>Jangka Waktu</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data as $no => $item)
                                                                <tr>
                                                                    <td>{{ $no+1 }}</td>
                                                                    <td>{{ $data->created_at }}</td>
                                                                    <td>{{ $data->no_pokok_nasabah }}</td>
                                                                    <td>Rp. {{ format_number($data->jumlah_pinjaman) }}</td>
                                                                    <td>{{ $data->status }}</td>
                                                                    <td>{{ $data->jangka_waktu }}</td>
                                                                    <td><a href="/karyawan-cetak-pinjaman"
                                                                            class="btn btn-icon btn-outline-secondary btn-sm">
                                                                            <span class="tf-icons bx bx-printer"></span>
                                                                        </a></td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tanggal</th>
                                                                <th>ID Nasabah</th>
                                                                <th>Nominal Pinjaman</th>
                                                                <th>Status Pinjaman</th>
                                                                <th>Jangka Waktu</th>
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

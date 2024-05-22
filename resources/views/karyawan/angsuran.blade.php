@extends('karyawan.layout.master')

@section('title')
    Dashboard Karyawan
@endsection

@section('judul')
    Data Angsuran Pembayaran Pinjaman
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <h5 class="card-title">Data Angsuran Pembayaran Pinjaman</h5>
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
                                <form action="/submit-pinjaman" method="post">
                                    @csrf
                                    <div class="d-flex">
                                        <p class="col-md-4">No Pokok Nasabah</p>
                                        <p class="col-md-4">: <span>
                                                @isset($data_nasabah)
                                                    {{ $data_nasabah->no_pokok_nasabah }}
                                                @endisset
                                            </span></p>
                                    </div>
                                    <input type="hidden"
                                        name="no_pokok_nasabah"value="@isset($data_nasabah) {{ $data_nasabah->no_pokok_nasabah }} @endisset">
                                    <div class="d-flex">
                                        <p class="col-4">Nama Nasabah</p>
                                        <p class="col-md-4">: <span>
                                                @isset($data_nasabah)
                                                    {{ $data_nasabah->nama_nasabah }}
                                                @endisset
                                            </span></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="col-md-4">Alamat</p>
                                        <p class="col-md-4">: <span>
                                                @isset($data_nasabah)
                                                    {{ $data_nasabah->alamat }}
                                                @endisset
                                            </span></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="col-md-4">Sisa Pokok Setoran</p>
                                        <p class="col-md-4">: <span>
                                                @isset($data_nasabah)
                                                    {{ $data_nasabah->alamat }}
                                                @endisset
                                            </span></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="col-md-4">ID Pembayaran</p>
                                        <p class="col-md-4">: <span>
                                                @isset($data_nasabah)
                                                    {{ $data_nasabah->alamat }}
                                                @endisset
                                            </span></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="col-md-4">Tanggal Bayar</p>
                                        <p class="col-md-4">: <span>{{ date('d-m-Y') }}</span></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="col-md-4">Jumlah Pinjaman</p>
                                        <p class="col-md-4">: <span>
                                                @isset($data_nasabah)
                                                    {{ $data_nasabah->alamat }}
                                                @endisset
                                            </span></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="col-md-4">Jangka Waktu</p>
                                        <p class="col-md-4">: <span>
                                                @isset($data_nasabah)
                                                    {{ $data_nasabah->alamat }}
                                                @endisset
                                            </span></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="col-md-4">Bunga Perbulan</p>
                                        <p class="col-md-4">: <span id="bunga_perbulan">0 %</span></p>
                                        <input type="hidden" name="bunga_perbulan" id="input_bunga_perbulan">
                                    </div>
                                    <div class="d-flex">
                                        <p class="col-md-4">Total Tagihan Bulan Ini</p>
                                        <p class="col-md-4">: <span id="total_bayar">Rp. 0</span></p>
                                        <input type="hidden" name="total_bayar_perbulan" id="input_total_bayar_perbulan">
                                    </div>
                                    <div class="d-flex">
                                        <p class="col-md-4">Pembayaran Ke-</p>
                                        <p class="col-md-4">: <span id="bunga_perbulan">0</span></p>
                                        <input type="hidden" name="bunga_perbulan" id="input_bunga_perbulan">
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        <div>
                                            <a href="/karyawan-pinjaman" class="btn btn-primary"><i
                                                    class="bx bx-refresh fs-4 lh-0"></i>Batal</a>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="bx bx-save fs-4 lh-0"></i>simpan</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 mb-4 order-0">
                                        <div class="card">
                                            <div class="d-flex align-items-end row">
                                                <div class="card-body">
                                                    <h5 class="card-title">List Data Pengajuan Pinjaman</h5>
                                                    <table id="example" class="display" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tanggal Pengajuan</th>
                                                                <th>ID Nasabah</th>
                                                                <th>Nama Nasabah</th>
                                                                <th>Nominal Pembayaran</th>
                                                                <th>Status Pembayaran</th>
                                                                <th>Jangka Waktu</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>
                                                                <td>1</td>
                                                                <td>12-12-2024</td>
                                                                <td>123144</td>
                                                                <td>akhmad</td>
                                                                <td>Rp. 2.000.000</td>
                                                                <td>
                                                                    Menunggu Konfirmasi
                                                                </td>
                                                                <td>3 Bulan</td>
                                                                <td><a href="/karyawan-cetak-angsuran"
                                                                        class="btn btn-icon btn-outline-secondary btn-sm">
                                                                        <span class="tf-icons bx bx-printer"></span>
                                                                    </a></td>
                                                            </tr>


                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tanggal Pengajuan</th>
                                                                <th>ID Nasabah</th>
                                                                <th>Nama Nasabah</th>
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

        <script>
            function formatCurrency(amount) {
                return amount.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });
            }

            function calculateLoan() {
                const jumlahPinjaman = parseFloat(document.getElementById('jumlah_pinjaman').value) || 0;
                const jangkaWaktu = parseInt(document.getElementById('largeSelect').value) || 0;

                let bungaPerBulan = 0; // Default 0%

                if (jangkaWaktu === 3) {
                    bungaPerBulan = 0.025; // 2.5%
                } else if (jangkaWaktu === 6) {
                    bungaPerBulan = 0.02; // 2%
                } else if (jangkaWaktu === 12) {
                    bungaPerBulan = 0.015; // 1.5%
                } else if (jangkaWaktu === 24) {
                    bungaPerBulan = 0.013; // 1.3%
                }

                if (jumlahPinjaman > 0 && jangkaWaktu > 0) {
                    // const totalPokok = jumlahPinjaman / jangkaWaktu;
                    const totalBungaPerBulan = jumlahPinjaman / jangkaWaktu * bungaPerBulan;
                    const totalBayarPerBulan = jumlahPinjaman / jangkaWaktu + totalBungaPerBulan;

                    // document.getElementById('total_pokok').textContent = formatCurrency(totalPokok);
                    document.getElementById('bunga_perbulan').textContent = (bungaPerBulan * 100).toFixed(1) + ' %';
                    document.getElementById('input_bunga_perbulan').value = (bungaPerBulan * 100).toFixed(1);
                    document.getElementById('total_bayar').textContent = formatCurrency(totalBayarPerBulan);
                    document.getElementById('input_total_bayar_perbulan').value = totalBayarPerBulan;
                } else {
                    // document.getElementById('total_pokok').textContent = 'Rp. 0';
                    document.getElementById('bunga_perbulan').textContent = '0 %';
                    document.getElementById('total_bayar').textContent = 'Rp. 0';
                    document.getElementById('input_bunga_perbulan').value = 0;
                    document.getElementById('input_total_bayar_perbulan').value = 0;
                }
            }

            document.getElementById('jumlah_pinjaman').addEventListener('input', calculateLoan);
        </script>
    @endpush

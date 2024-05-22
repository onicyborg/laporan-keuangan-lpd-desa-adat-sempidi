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
                                    <input type="hidden" name="no_pokok_nasabah"value="@isset($data_nasabah) {{ $data_nasabah->no_pokok_nasabah }} @endisset">
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
                                        <p class="col-md-4">Tanggal Pengajuan Pinjaman</p>
                                        <p class="col-md-4">: <span>{{ date('d-m-Y') }}</span></p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <p class="col-md-4">Jumlah Pinjaman</p>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control mb-3" id="jumlah_pinjaman"
                                                name="jumlah_pinjaman" required />
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <p class="col-md-4">Besar Pendapatan</p>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control mb-3" id="besar_pendapatan"
                                                name="besar_pendapatan" required />
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <p class="col-md-4">Tujuan Pinjaman</p>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control mb-3" name="tujuan_pinjaman"
                                                required />
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <p class="col-md-4">Jaminan</p>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control mb-3" name="jaminan" required />
                                        </div>
                                    </div>
                                    <div class="d-flex d-flex align-items-center justify-content-between mb-3">
                                        <p class="col-md-4">Jangka Waktu</p>
                                        <div class="col-md-8">
                                            <select id="largeSelect" class="form-select form-select" name="jangka_waktu"
                                                onchange="calculateLoan()" required>
                                                <option selected disabled>- Pilih Jangka Waktu -</option>
                                                <option value="3">3 Bulan</option>
                                                <option value="6">6 Bulan</option>
                                                <option value="12">12 Bulan</option>
                                                <option value="24">24 Bulan</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex">
                                        <p class="col-md-4">Total Pokok Setoran Liburan</p>
                                        <p class="col-md-4">: <span id="total_pokok">Rp. 0</span></p>
                                    </div> --}}
                                    <div class="d-flex">
                                        <p class="col-md-4">Bunga Perbulan</p>
                                        <p class="col-md-4">: <span id="bunga_perbulan">0 %</span></p>
                                        <input type="hidden" name="bunga_perbulan" id="input_bunga_perbulan">
                                    </div>
                                    <div class="d-flex">
                                        <p class="col-md-4">Total Bayar Perbulan</p>
                                        <p class="col-md-4">: <span id="total_bayar">Rp. 0</span></p>
                                        <input type="hidden" name="total_bayar_perbulan" id="input_total_bayar_perbulan">
                                    </div>
                                    <div class="d-flex">
                                        <p class="col-md-4">Biaya Peminjaman</p>
                                        <p class="col-md-4">: <span id="biaya_peminjaman">Rp. 100.000</span></p>
                                        <input type="hidden" name="biaya_peminjaman" id="input_biaya_peminjaman"
                                            value="100000">
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
                                                                <th>Nominal Pinjaman</th>
                                                                <th>Status Pinjaman</th>
                                                                <th>Jangka Waktu</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data as $no => $item)
                                                                <tr>
                                                                    <td>{{ $no + 1 }}</td>
                                                                    <td>{{ $item->created_at }}</td>
                                                                    <td>{{ $item->no_pokok_nasabah }}</td>
                                                                    <td>{{ $item->nasabah->nama_nasabah }}</td>
                                                                    <td>Rp. {{ number_format($item->jumlah_pinjaman) }}</td>
                                                                    <td>
                                                                        @if ($item->status == 'menunggu_konfirmasi')
                                                                            Menunggu Konfirmasi Pimpinan
                                                                        @else
                                                                            Di Konfirmasi
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $item->jangka_waktu }} Bulan</td>
                                                                    <td><a href="/karyawan-cetak-pinjaman/{{ $item->id }}"
                                                                            class="btn btn-icon btn-outline-secondary btn-sm">
                                                                            <span class="tf-icons bx bxs-detail"></span>
                                                                        </a></td>
                                                                </tr>
                                                            @endforeach

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

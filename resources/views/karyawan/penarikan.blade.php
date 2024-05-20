@extends('karyawan.layout.master')

@section('title')
    Dashboard Karyawan
@endsection

@section('judul')
    Data Penarikan Simpanan
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <h5 class="card-title">Data Penarikan Simpanan</h5>
                            <hr>
                            <form action="/cari-nasabah-penarikan" method="post">
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
                                <form action="/submit-penarikan" method="post" onsubmit="return checkNominal()">
                                    @csrf
                                    <input type="hidden" name="no_pokok_nasabah"
                                        value="@isset($data_nasabah){{ $data_nasabah->no_pokok_nasabah }}@endisset">
                                    <div class="d-flex">
                                        <p class="col-md-4">No Pokok Nasabah</p>
                                        <p class="col-md-4">: <span>
                                                @isset($data_nasabah)
                                                    {{ $data_nasabah->no_pokok_nasabah }}
                                                @endisset
                                            </span></p>
                                    </div>
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
                                        <input type="hidden" name="saldo" id="saldo" value="{{ isset($data_nasabah) ? $data_nasabah->simpanan->sortByDesc('created_at')->first()->saldo_akhir : '0' }}">
                                        <p class="col-md-4">Saldo</p>
                                        <p class="col-md-4">: <span>Rp.
                                                @isset($data_nasabah)
                                                    {{ number_format($data_nasabah->simpanan->sortByDesc('created_at')->first()->saldo_akhir) }}
                                                @endisset
                                            </span></p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="col-md-4">
                                            <label for="form-label">Tanggal Penarikan</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control" disabled
                                                value="{{ date('Y-m-d') }}" />
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="col-md-4">
                                            <label for="nominal_penarikan">Nominal Penarikan Simpanan</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control @error('nominal_penarikan') is-invalid @enderror" id="nominal_penarikan" name="nominal_penarikan" required />
                                            @error('nominal_penarikan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end mt-3">
                                        <div>
                                            <a href="/karyawan-penarikan" class="btn btn-primary"><i
                                                    class="bx bx-refresh fs-4 lh-0"></i>batal</a>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="bx bx-save fs-4 lh-0"></i>simpan</button>
                                            <button class="btn btn-primary"><i
                                                    class="bx bx-printer fs-4 lh-0"></i>cetak</button>
                                        </div>
                                    </div>
                                </form>
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
                                                                <th>Jenis Transaksi</th>
                                                                <th>Saldo Awal</th>
                                                                <th>Jumlah Penarikan</th>
                                                                <th>Saldo Akhir</th>
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
                                                                    <td>{{ $item->jenis_transaksi }}</td>
                                                                    <td>{{ $item->saldo_awal }}</td>
                                                                    <td>{{ $item->jumlah_penarikan }}</td>
                                                                    <td>{{ $item->saldo_akhir }}</td>
                                                                    <td><a href="/detail-nasabah/"
                                                                            class="btn btn-icon btn-outline-secondary btn-sm">
                                                                            <span class="tf-icons bx bx-search-alt"></span>
                                                                        </a></td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tanggal</th>
                                                                <th>ID PN</th>
                                                                <th>Nama Nasabah</th>
                                                                <th>Jenis Transaksi</th>
                                                                <th>Saldo Awal</th>
                                                                <th>Jumlah Penarikan</th>
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

        <script>
            // Ambil nilai saldo akhir dari input hidden
            var saldoAkhir = parseInt(document.getElementById('saldo').value);

            // Fungsi untuk mengecek nominal penarikan
            function checkNominal() {
                var nominalPenarikan = parseInt(document.getElementById('nominal_penarikan').value);

                // Jika nominal penarikan lebih besar dari saldo akhir
                if (saldoAkhir == 0 ||nominalPenarikan > saldoAkhir) {
                    // Tampilkan pesan error menggunakan SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Cari data terlebih dahulu dan nominal penarikan tidak boleh lebih dari saldo akhir',
                    });
                    // Hentikan proses submit form
                    return false;
                }
                // Jika nominal penarikan valid, lanjutkan proses submit form
                return true;
            }
        </script>
    @endpush

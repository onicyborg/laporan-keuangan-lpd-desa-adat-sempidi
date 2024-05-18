@extends('karyawan.layout.master')

@section('title')
    Dashboard Karyawan
@endsection

@section('judul')
    Data Master
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <h5 class="card-title">Form Nasabah Baru</h5>
                            <form id="formAuthentication" class="mb-3" action="/new-nasabah" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text"
                                                class="form-control @error('nama_nasabah') is-invalid @enderror"
                                                id="nama" name="nama_nasabah" placeholder="Masukkan nama nasabah" />
                                            @error('nama_nasabah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                            <input type="text"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                id="tempat_lahir" name="tempat_lahir"
                                                placeholder="Masukkan tempat lahir nasabah" />
                                            @error('tempat_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir" name="tanggal_lahir" />
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                            <input type="text"
                                                class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                                                name="pekerjaan" placeholder="Masukkan pekerjaan nasabah" />
                                            @error('pekerjaan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="telpon" class="form-label">Telpon</label>
                                            <input type="text" class="form-control @error('telpon') is-invalid @enderror"
                                                id="telpon" name="telpon" placeholder="Masukkan nomor telpon nasabah" />
                                            @error('telpon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="no_ktp" class="form-label">Nomor KTP</label>
                                            <input type="text" class="form-control @error('no_ktp') is-invalid @enderror"
                                                id="no_ktp" name="no_ktp" placeholder="Masukkan nomor KTP nasabah" />
                                            @error('no_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="alamat">Alamat</label>
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                                                placeholder="Masukkan alamat nasabah"></textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                        <th>ID Nasabah</th>
                                        <th>Nama</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Pekerjaan</th>
                                        <th>Nomor Telpon</th>
                                        <th>Status Nasabah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nasabahs as $no => $data)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $data->no_pokok_nasabah }}</td>
                                            <td>{{ $data->nama_nasabah }}</td>
                                            <td>{{ $data->tempat_lahir }}, {{ $data->tanggal_lahir }}</td>
                                            <td>{{ $data->pekerjaan }}</td>
                                            <td>{{ $data->telpon }}</td>
                                            <td>{{ $data->status_nasabah }}</td>
                                            <td>
                                                <a href="#" class="btn btn-icon btn-outline-secondary btn-sm">
                                                    <span class="tf-icons bx bx-search-alt"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Nasabah</th>
                                        <th>Nama</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Pekerjaan</th>
                                        <th>Nomor Telpon</th>
                                        <th>Status Nasabah</th>
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
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
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

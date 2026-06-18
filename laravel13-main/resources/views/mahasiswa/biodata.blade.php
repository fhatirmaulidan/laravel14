@extends('layout.app')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Biodata Saya</h1>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Selamat Datang,</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa->nama }}</div>
                            <small class="text-muted">Status Akun: {{ ucfirst(Auth::user()->role) }}</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Lengkap Akademik</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th width="250" class="bg-light font-weight-bold">Nomor Induk Mahasiswa (NIM)</th>
                            <td>{{ $mahasiswa->nim }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light font-weight-bold">Nama Lengkap</th>
                            <td>{{ $mahasiswa->nama }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light font-weight-bold">Program Studi (Prodi)</th>
                            <td>{{ $mahasiswa->prodi->nama_prodi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light font-weight-bold">Jurusan</th>
                            <td>{{ $mahasiswa->prodi->jurusan->nama_jurusan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light font-weight-bold">Alamat Tinggal</th>
                            <td>{{ $mahasiswa->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
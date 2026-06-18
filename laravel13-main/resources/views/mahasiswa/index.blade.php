@extends('layout.app')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
    <p class="mb-4">Daftar mahasiswa yang terdaftar pada sistem akademik.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
            
            <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Mahasiswa
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="60">No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Alamat</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->prodi->nama_prodi ?? '-' }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="{{ route('admin.mahasiswa.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('admin.mahasiswa.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
@extends('layout.app')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Program Studi (Prodi)</h1>
    <p class="mb-4">
        Daftar program studi yang tersedia pada sistem akademik beserta jurusannya.
    </p>

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Prodi
            </h6>

            <a href="{{ route('admin.prodi.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Tambah Prodi
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead class="thead-light">
                        <tr>
                            <th width="80">No</th>
                            <th>Nama Prodi</th>
                            <th>Jurusan</th> <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($prodis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_prodi }}</td>
                            <td>
                                {{ $item->jurusan->nama_jurusan ?? 'Tidak Ada Jurusan' }}
                            </td>
                            <td>

                                <a href="{{ route('admin.prodi.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('admin.prodi.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus prodi ini?')"> 
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
@extends('layout.app')
@section('content')
<div class="container-fluid">

    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Jurusan</h1>
    <p class="mb-4">
        Daftar jurusan yang tersedia pada sistem akademik.
    </p>

    <!-- Data Jurusan -->
    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Jurusan
            </h6>

            <a href="tambah_jurusan.html" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Tambah Jurusan
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead class="thead-light">
                        <tr>
                            <th width="80">No</th>
                            <th>Nama Jurusan</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Informatika dan Bisnis</td>
                            <td>
                                <a href="ubah_jurusan.html" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Update
                                </a>

                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Rekayasa Mesin dan Manufaktur</td>
                            <td>
                                <a href="ubah_jurusan.html" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Update
                                </a>

                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>

@endsection

<!DOCTYPE html>
<html>
<head>
    <title>Data Jurusan</title>
</head>
<body>

    <h1>Data Jurusan</h1>
    <a href="/jurusan/create">Tambah Jurusan</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama Jurusan</th>
            <th>Aksi</th>
        </tr>

        @foreach($jurusans as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_jurusan }}</td>
            <td>

                <a href="/jurusan/{{ $item->id }}/edit">
                    Edit
                </a>

                <form action="/jurusan/{{ $item->id }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Hapus
                    </button>

                </form>

            </td>
        </tr>
        @endforeach

    </table>

</body>
</html>
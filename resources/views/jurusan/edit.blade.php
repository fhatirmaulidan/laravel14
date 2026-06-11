@extends('layout.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Jurusan</h1>
    <p class="mb-4">
        Form untuk memperbarui nama jurusan dalam sistem akademik.
    </p>

    <!-- Card Form Edit -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Edit Jurusan
            </h6>
        </div>
        <div class="card-body">
            <form action="/jurusan/{{ $jurusan->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_jurusan" class="font-weight-bold">Nama Jurusan</label>
                    <input type="text" 
                           id="nama_jurusan"
                           name="nama_jurusan" 
                           class="form-control" 
                           value="{{ $jurusan->nama_jurusan }}" 
                           placeholder="Masukkan nama jurusan" 
                           required>
                </div>

                <button type="submit" class="btn btn-warning shadow-sm">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

</div>
@endsection
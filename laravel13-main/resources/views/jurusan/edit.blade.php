@extends('layout.app')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Jurusan</h1>
    <p class="mb-4">Silakan ubah nama jurusan pada form di bawah ini.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Jurusan</h6>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-4">
                    <label for="nama_jurusan" class="font-weight-bold">Nama Jurusan</label>
                    <input type="text" 
                           class="form-control" 
                           id="nama_jurusan" 
                           name="nama_jurusan" 
                           value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" 
                           required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>

        </div>
    </div>

</div>
@endsection
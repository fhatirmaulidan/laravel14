@extends('layout.app')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Silakan ubah data program studi pada form di bawah ini.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Program Studi</h6>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.prodi.update', $prodi->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="form-group mb-3">
                    <label for="nama_prodi" class="font-weight-bold">Nama Program Studi</label>
                    <input type="text" 
                           class="form-control" 
                           id="nama_prodi" 
                           name="nama_prodi" 
                           value="{{ old('nama_prodi', $prodi->nama_prodi) }}" 
                           required>
                </div>

                <div class="form-group mb-4">
                    <label for="jurusan_id" class="font-weight-bold">Jurusan</label>
                    <select class="form-control" id="jurusan_id" name="jurusan_id" required>
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}" 
                                {{ old('jurusan_id', $prodi->jurusan_id) == $jurusan->id ? 'selected' : '' }}>
                                {{ $jurusan->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                
                <a href="{{ route('admin.prodi.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>

        </div>
    </div>

</div>
@endsection
@extends('layout.app')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Edit Data Mahasiswa</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Ubah Data</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.mahasiswa.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Nama Mahasiswa</label>
                    <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Program Studi</label>
                    <select name="prodi_id" class="form-control" required>
                        @foreach($prodis as $p)
                            <option value="{{ $p->id }}" {{ $mahasiswa->prodi_id == $p->id ? 'selected' : '' }}>
                                {{ $p->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ $mahasiswa->alamat }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>
@endsection
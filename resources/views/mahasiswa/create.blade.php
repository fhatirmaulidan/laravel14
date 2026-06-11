@extends('layout.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Mahasiswa</h1>
    <p class="mb-4">
        Form untuk menambahkan data mahasiswa baru ke dalam sistem akademik.
    </p>

    <!-- Card Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Tambah Mahasiswa
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.index') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="prodi_id" class="font-weight-bold">Prodi</label>
                    <select name="prodi_id" id="prodi_id" class="form-control" required>
                        <option value="" disabled selected>Pilih Program Studi</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}">
                                {{ $prodi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nim" class="font-weight-bold">NIM</label>
                    <input type="text" 
                           id="nim"
                           name="nim" 
                           class="form-control" 
                           placeholder="Masukkan NIM" 
                           required>
                </div>

                <div class="form-group">
                    <label for="nama" class="font-weight-bold">Nama</label>
                    <input type="text" 
                           id="nama"
                           name="nama" 
                           class="form-control" 
                           placeholder="Masukkan nama mahasiswa" 
                           required>
                </div>

                <div class="form-group">
                    <label for="alamat" class="font-weight-bold">Alamat</label>
                    <textarea id="alamat" 
                              name="alamat" 
                              class="form-control" 
                              rows="5" 
                              placeholder="Masukkan alamat" 
                              required></textarea>
                </div>

                <button type="submit" class="btn btn-primary shadow-sm">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

</div>
@endsection
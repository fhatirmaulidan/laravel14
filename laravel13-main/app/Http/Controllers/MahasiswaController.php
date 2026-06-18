<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User; // Memastikan Model User terimport dengan benar
use App\Models\Jurusan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $title = 'Mahasiswa';
        $mahasiswas = Mahasiswa::with('prodi')->get();
        $jurusans = Jurusan::all(); 

        return view('mahasiswa.index', compact('mahasiswas', 'jurusans', 'title'));
    }
    
    public function create()
    {
        $prodis = Prodi::all();
        return view('mahasiswa.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        // 1. Buat akun login di tabel users terlebih dahulu
        $user = User::create([
            'name' => $request->nama,
            'username' => $request->nim, // Username otomatis menggunakan NIM
            'password' => '123456',     // Password default (otomatis di-hash oleh cast di model User)
            'role' => 'mahasiswa',       // Role diatur sebagai mahasiswa
        ]);

        // 2. Buat data mahasiswa dengan mengaitkan user_id yang baru saja dibuat
        Mahasiswa::create([
            'user_id' => $user->id,      // Mengambil ID dari akun user di atas
            'prodi_id' => $request->prodi_id,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.mahasiswa.index');
    }

    public function edit($id)
    {
        $title = 'Mahasiswa';
        $mahasiswa = Mahasiswa::findOrFail($id);
        $prodis = Prodi::all();

        return view('mahasiswa.edit', compact('mahasiswa', 'prodis', 'title'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Update data mahasiswanya
        $mahasiswa->update([
            'prodi_id' => $request->prodi_id,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        // Serta update nama di tabel users yang terelasi
        $mahasiswa->user->update([
            'name' => $request->nama,
            'username' => $request->nim,
        ]);

        return redirect()->route('admin.mahasiswa.index');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        
        // Karena di migration menggunakan cascadeOnDelete, 
        // kita cukup menghapus user-nya, maka data mahasiswanya otomatis ikut terhapus.
        if ($mahasiswa->user) {
            $mahasiswa->user->delete();
        } else {
            $mahasiswa->delete();
        }

        return redirect()->route('admin.mahasiswa.index');
    }
}
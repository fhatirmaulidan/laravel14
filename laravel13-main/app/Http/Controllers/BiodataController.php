<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    public function index()
    {
        $title = 'Biodata Saya';
        
        // Mengambil data user yang sedang login beserta relasi data mahasiswanya
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        // Jika data mahasiswa belum diisi oleh admin, arahkan balik atau tangani agar tidak eror
        if (!$mahasiswa) {
            return "Akun Anda belum tersambung dengan data mahasiswa. Silakan hubungi admin.";
        }

        // Lemparkan data mahasiswa ke halaman view biodata
        return view('mahasiswa.biodata', compact('mahasiswa', 'title'));
    }
}
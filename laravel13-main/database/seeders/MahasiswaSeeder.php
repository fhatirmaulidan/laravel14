<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil ID prodi pertama yang tersedia dari database sebagai relasi default
        $prodiIdDefault = Prodi::first() ? Prodi::first()->id : 1;

        // 1. DATA DUMMY MAHASISWA 1: Budi Santoso
        $user1 = User::create([
            'name' => 'Budi Santoso',
            'username' => '22010101', // NIM sebagai username login
            'password' => '123456',
            'role' => 'mahasiswa',
        ]);

        Mahasiswa::create([
            'user_id' => $user1->id,
            'prodi_id' => $prodiIdDefault,
            'nim' => '22010101',
            'nama' => 'Budi Santoso',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);

        // 2. DATA DUMMY MAHASISWA 2: Siti Aisyah
        $user2 = User::create([
            'name' => 'Siti Aisyah',
            'username' => '22010102', // NIM sebagai username login
            'password' => '123456',
            'role' => 'mahasiswa',
        ]);

        Mahasiswa::create([
            'user_id' => $user2->id,
            'prodi_id' => $prodiIdDefault,
            'nim' => '22010102',
            'nama' => 'Siti Aisyah',
            'alamat' => 'Jl. Sudirman No. 5',
        ]);
    }
}
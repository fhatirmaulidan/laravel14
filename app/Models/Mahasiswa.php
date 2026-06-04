<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'prodi_id',
        'nim',
        'nama',
        'alamat'
    ];


    // banyak mahasiswa milik 1 prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
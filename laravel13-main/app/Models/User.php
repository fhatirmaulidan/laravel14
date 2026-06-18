<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Menentukan kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'name',
        'username',
        'password',
        'role', 
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    
    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'user_id');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $title = 'Prodi';
        $prodis = Prodi::with('jurusan')->get();

        // Mengarah ke folder resources/views/prodi/index.blade.php
        return view('prodi.index', compact('prodis', 'title'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();

        // Mengarah ke folder resources/views/prodi/create.blade.php
        return view('prodi.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        Prodi::create([
            'jurusan_id' => $request->jurusan_id,
            'nama_prodi' => $request->nama_prodi,
        ]);

        // Diubah ke admin.prodi.index mengikuti name dari Route::resource
        return redirect()->route('admin.prodi.index');
    }

    public function edit($id)
    {
        $title = 'Edit Prodi';
        $prodi = Prodi::findOrFail($id);
        $jurusans = Jurusan::all();
        
        // Mengarah ke folder resources/views/prodi/edit.blade.php
        return view('prodi.edit', compact('prodi', 'jurusans', 'title'));
    }

    public function update(Request $request, $id)
    {
        $prodi = Prodi::findOrFail($id);

        $prodi->update([
            'jurusan_id' => $request->jurusan_id,
            'nama_prodi' => $request->nama_prodi,
        ]);

        // Diubah ke admin.prodi.index mengikuti name dari Route::resource
        return redirect()->route('admin.prodi.index');
    }

    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        // Diubah ke admin.prodi.index mengikuti name dari Route::resource
        return redirect()->route('admin.prodi.index');
    }
}
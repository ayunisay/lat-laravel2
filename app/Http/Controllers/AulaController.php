<?php

namespace App\Http\Controllers;

use App\Models\aula;

use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::all();
        return view('aula', ['aula' => $aulas]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_peminjam' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        Aula::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'nama_peminjam' => $request->nama_peminjam,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('aula')->with('success', 'Peminjaman aula berhasil ditambahkan!');
    }
    
}
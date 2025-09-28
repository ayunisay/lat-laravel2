<?php

namespace App\Http\Controllers;

use App\Models\aula;

use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function aula()
    {
        $aulas = Aula::all();
        return view('aula', ['aula' => $aulas]);
    }

    public function tambahAula(){
        return view('tambah-aula');
    }

    public function tambahAulaSubmit(Request $request)
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
    
    public function editAula(Aula $aula, $id)
    {
        $aulas = Aula::find($id);
        return view('edit-aula', ['aula' => $aulas]);
    }

    public function editAulaSimpan(Request $request, $id){
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_peminjam' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        Aula::where('id', $id)->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'nama_peminjam' => $request->nama_peminjam,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);
        return redirect()->route('aula')->with('success','Aula berhasil diedit');
    }

    public function hapusAula($id){
        Aula::find($id)->delete();
        return redirect()->route('aula')->with('success','Aula berhasil dihapus');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\Barang as ModelsBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function barang()
    {
        $barangs = Barang::all();
        return view('barang', ['barang' => $barangs]);
    }
    
    public function tambahBarang(){
        return view('tambah-barang');
    }

    public function tambahBarangSubmit(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'nama_peminjam' => 'required|string|max:255',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjam',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'nama_peminjam' => $request->nama_peminjam,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
        ]);

        return redirect()->route('barang')->with('success', 'Peminjaman Barang berhasil ditambahkan!');
    }

    public function editBarang(Barang $barang, $id)
    {
        $barangs = Barang::find($id);
        return view('edit-barang', ['barang' => $barangs]);
    }

    public function editBarangSimpan(Request $request, $id){
        $request->validate([
            'nama_barang' => 'required|string|sometimes|max:255',
            'nama_peminjam' => 'required|string|sometimes|max:255',
            'tanggal_peminjaman' => 'required|sometimes|date',
            'tanggal_pengembalian' => 'required|sometimes|date|after_or_equal:tanggal_peminjam',
        ]);

        Barang::where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'nama_peminjam' => $request->nama_peminjam,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
        ]);
        return redirect()->route('barang')->with('success','Barang berhasil diedit');
    }

    public function hapusBarang($id){
        Barang::find($id)->delete();
        return redirect()->route('barang')->with('success','Barang berhasil dihapus');
    }
}   
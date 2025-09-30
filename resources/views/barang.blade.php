@include('layout.layout')
            <div class="grid items-center justify-center pl-20">
                <div class="pt-15 text-xl font-bold">
                        <h1>List Peminjaman Barang</h1>
                    </div>
                    <div class="pt-10 text-base font-bold">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-md">
                            <a href="{{route('tambah-barang-form')}}">Tambah Peminjaman Barang</a>
                        </button>
                    </div>
                    <div class="rounded-md overflow-hidden pt-3">
                        <table class="table-auto border-collapse border-2 border-slate-400 text-base">
                            <thead>
                                <tr>
                                    <th class="border-2 border-slate-400 p-4">Nama Barang</th>
                                    <th class="border-2 border-slate-400 p-4">Peminjam</th>
                                    <th class="border-2 border-slate-400 p-4">Tanggal Ambil</th>
                                    <th class="border-2 border-slate-400 p-4">Tanggal Kembali</th>
                                    <th class="border-2 border-slate-400 p-4">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($barang == null)
                                    <td>Tidak ada data</td>
                                @else
                                    @foreach ($barang as $barangs)
                                    <tr>
                                        <td class="border-2 border-slate-400 p-4">{{ $barangs -> nama_barang }}</td>
                                        <td class="border-2 border-slate-400 p-4">{{ $barangs ->  nama_peminjam}}</td>
                                        <td class="border-2 border-slate-400 p-4">{{ $barangs -> tanggal_peminjaman }}</td>
                                        <td class="border-2 border-slate-400 p-4">{{ $barangs -> tanggal_pengembalian }}</td>
                                        <td class="border-2 border-slate-400 p-4">
                                            <a href="{{ route('edit-barang', ['id'=>$barangs->id]) }}">
                                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-5 rounded-md">Edit</button>
                                            </a>
                                            <form action="{{ route('hapus-barang', ['id'=>$barangs->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded-md mt-3" type="submit" onclick="return confirm('Yakin?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach 
                                @endif
                            </tbody>
                        </table>
                    </div>
            </div>
        </body>
    </html>
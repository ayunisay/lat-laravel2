<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            // Tambahkan kolom 'nama_barang'
            $table->string('nama_barang', 255)->after('id'); // Tipe string, panjang 255
        });
    }

    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            // Hapus kolom saat rollback
            $table->dropColumn('nama_barang');
        });
    }
};
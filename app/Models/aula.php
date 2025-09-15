<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $table = 'aula';
    public $timestamps = false; // Add this line

    protected $fillable = [
        'nama_kegiatan',
        'nama_peminjam',
        'tanggal_mulai',
        'tanggal_selesai',
    ];
}
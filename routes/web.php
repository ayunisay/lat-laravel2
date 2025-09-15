<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AulaController;

Route::get('/', function () {
    return view('home');
})-> name('home');

Route::get('/barang', [BarangController::class, 'index'])->name('barang');

Route::get('/aula', [AulaController::class, 'index'])->name('aula');

Route::get('/video-tutorial', function () {
    return view('tutorial');
})-> name('tutorial');

Route::get('/tambah-barang', function () {
    return view('tambah-barang');
})->name('tambah-barang-form');

// POST route to handle the form submission and store data
Route::post('/tambah-barang-submit', [BarangController::class, 'create'])->name('tambah-barang-submit');

Route::get('/tambah-aula', function () {
    return view('tambah-aula');
})->name('tambah-aula-form');

// POST route to handle the form submission and store data
Route::post('/tambah-aula', [AulaController::class, 'create'])->name('tambah-aula-submit');

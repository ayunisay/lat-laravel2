<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TutorialController;

//view
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/barang', [BarangController::class, 'barang'])->name('barang');
Route::get('/aula', [AulaController::class, 'aula'])->name('aula');
Route::get('/video-tutorial', [TutorialController::class,'tutor'])->name('tutorial');

//create 
Route::get('/tambah-barang', [BarangController::class,'tambahBarang'])->name('tambah-barang-form');
Route::post('/tambah-barang-submit', [BarangController::class, 'tambahBarangSubmit'])->name('tambah-barang-submit');

Route::get('/tambah-aula', [AulaController::class,'tambahAula'])->name('tambah-aula-form');
Route::post('/tambah-aula-submit', [AulaController::class, 'tambahAulaSubmit'])->name('tambah-aula-submit');

//update
Route::get('/edit-barang/{id}', [BarangController::class, 'editBarang'])->name('edit-barang');
Route::put('/edit-barang-simpan/{id}', [BarangController::class, 'editBarangSimpan'])->name('edit-barang-simpan');

Route::get('/edit-aula/{id}', [AulaController::class, 'editAula'])->name('edit-aula');
Route::put('/edit-aula-simpan/{id}', [AulaController::class, 'editAulaSimpan'])->name('edit-aula-simpan');

//delete
Route::delete('/delete-barang/{id}', [BarangController::class, 'hapusBarang'])->name('hapus-barang');

Route::delete('/delete-aula/{id}', [AulaController::class, 'hapusAula'])->name('hapus-aula');


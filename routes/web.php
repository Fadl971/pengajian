<?php

use App\Http\Controllers\pesertaController;
use App\Models\peserta;
use Illuminate\Support\Facades\Route;



Route::get('/peserta', [pesertaController::class, 'index'])->name('peserta.index'); // Menampilkan daftar anggota
Route::get('/peserta/create', [pesertaController::class, 'create'])->name('peserta.create'); // Menampilkan form tambah
Route::post('/peserta/store', [pesertaController::class, 'store'])->name('peserta.store'); // Menyimpan anggota baru
Route::get('/peserta/{id}/edit', [pesertaController::class, 'edit'])->name('peserta.edit');
 // Menampilkan form edit
 Route::get('/peserta/{id}/show', [pesertaController::class, 'show'])->name('peserta.show');
Route::put('/peserta/{id}', [pesertaController::class, 'update'])->name('peserta.update'); // Mengupdate data anggota
Route::delete('/peserta/{id}', [pesertaController::class, 'destroy'])->name('peserta.destroy'); // Menghapus data anggota

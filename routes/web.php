<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\pesertaController;
use App\Models\peserta;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return redirect()->route('login');});
 
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/', function () {return view('home');})->name('home'); 

Route::get('/peserta/{id}/detail', [pesertaController::class, 'detail'])->name('peserta.detail');
Route::get('/peserta/{peserta}/qrcode', [pesertaController::class, 'showQRCode'])->name('peserta.qrcode');
Route::get('/peserta/create', [pesertaController::class, 'create'])->name('peserta.create');
Route::post('/peserta/store', [pesertaController::class, 'store'])->name('peserta.store');

Route::get('/reset-password', [LoginController::class, 'showDirectResetPasswordForm'])->name('reset-password');
Route::post('/reset-password', [LoginController::class, 'resetPasswordDirect']);

// Admin
Route::middleware(['auth'])->group(function () {
Route::get('/peserta/{id}/edit', [pesertaController::class, 'edit'])->name('peserta.edit');
Route::get('/peserta/{id}/show', [pesertaController::class, 'show'])->name('peserta.show');
Route::put('/peserta/{id}', [pesertaController::class, 'update'])->name('peserta.update');
Route::delete('/peserta/{id}', [pesertaController::class, 'destroy'])->name('peserta.destroy');
Route::get('/peserta', [pesertaController::class, 'index'])->name('peserta.index');
     // Menampilkan daftar anggota
});




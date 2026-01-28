<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('siswa', SiswaController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('mapel', MataPelajaranController::class);
        Route::resource('pengajar', PengajarController::class);
        Route::get('/rekap-kelas', [NilaiController::class, 'rekapKelas'])->name('rekap.rekap-kelas');
        Route::get('/rekap-kelas/{kelas}/rekap-mapel', [NilaiController::class, 'rekapMapel'])->name('rekap.rekap-mapel');
        Route::get('/rekap-mapel/{pengajar}/nilai', [NilaiController::class, 'rekapNilai'])->name('rekap.nilai');
    });

Route::middleware(['auth', 'role:guru'])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'guru'])->name('dashboard');

        Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');

        Route::get('/nilai/{pengajar}', [NilaiController::class, 'create'])->name('nilai.create');

        Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');

        Route::get('/rekap', [NilaiController::class, 'rekap'])->name('nilai.rekap');

        Route::get('/nilai/{penilaian}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');

        Route::put('/nilai/{penilaian}', [NilaiController::class, 'update'])->name('nilai.update');

        Route::delete('/nilai/{penilaian}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
    });

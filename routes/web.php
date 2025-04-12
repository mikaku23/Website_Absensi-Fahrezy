<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\WalikelasController;

Route::fallback(function () {
    return response()->view('utama.eror', [], 404);
});

Route::get('/registrasi', [LoginController::class, 'tampilRegistrasi'])->name('registrasi');
Route::post('/registrasi/submit', [LoginController::class, 'submitRegistrasi'])->name('registrasi.submit');
Route::get('/', [LoginController::class, 'tampilLogin'])->name('login');
Route::post('/login/submit', [LoginController::class, 'submitLogin'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(
    function () {

    Route::get('/dashboardAdmin', [DashboardController::class, 'dashboardAdmin'])->name('dashboard-admin');
    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('local', LocalController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('walikelas', WalikelasController::class);
    Route::resource('ortu', OrtuController::class);
    Route::resource('user', UserController::class);
    Route::get('absenSiswa', [AbsenController::class, 'indexSiswa'])->name('absenSiswa.index');
    Route::delete('/absenSiswa/{id}', [AbsenController::class, 'destroy'])->name('absenSiswa.destroy');
    Route::get('/pengajuanAdmin', [PengajuanController::class, 'indexAdmin'])->name('pengajuanAdmin.index');


    Route::get('/dashboardGuru', [DashboardController::class, 'dashboardGuru'])->name('dashboard-guru');
    Route::resource('absen', AbsenController::class);
    Route::post('absen/updateStatus', [AbsenController::class, 'updateStatus'])->name('absen.updateStatus');
    Route::get('absen/{id}/edit', [AbsenController::class, 'edit'])->name('absen.edit');
    Route::put('absen/{id}', [AbsenController::class, 'update'])->name('absen.update');

    Route::resource('rekap', RekapController::class);
    Route::resource('pengajuan', PengajuanController::class);

    Route::get('/dashboardWalikelas', [DashboardController::class, 'dashboardWalikelas'])->name('dashboard-walikelas');
    Route::get('absenWalikelas', [AbsenController::class, 'indexWalikelas'])->name('absenWalikelas.index');
    Route::get('absenWalikelas/create', [AbsenController::class, 'createWalikelas'])->name('absenWalikelas.create');
    Route::post('absenWalikelas/membuat', [AbsenController::class, 'membuat'])->name('absenWalikelas.membuat');
    Route::get('absenWalikelas/{id}/edit', [AbsenController::class, 'editWalikelas'])->name('absenWalikelas.edit');
    Route::put('absenWalikelas/{id}', [AbsenController::class, 'updateWalikelas'])->name('absenWalikelas.update');

    Route::get('/validasi', [PengajuanController::class, 'index3'])->name('validasi.index');
    Route::put('pengajuan/{id}/updateStatus', [PengajuanController::class, 'updateStatus'])->name('pengajuan.updateStatus');

    });
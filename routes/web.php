<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BerandaController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SpmbController;
use App\Http\Controllers\Admin\SaranController;

// =====================
// FRONTEND ROUTES
// =====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/identitas-sekolah', [HomeController::class, 'identitas'])->name('identitas');
Route::get('/visi-misi', [HomeController::class, 'visimisi'])->name('visimisi');
Route::get('/sambutan-kepala', [HomeController::class, 'sambutan'])->name('sambutan');
Route::get('/staf-pengajar', [HomeController::class, 'stafPengajar'])->name('staf-pengajar');
Route::get('/fasilitas', [HomeController::class, 'fasilitas'])->name('fasilitas');
Route::get('/fasilitas/{id}', [HomeController::class, 'fasilitasDetail'])->name('fasilitas.detail');
Route::get('/program/kbtk', [HomeController::class, 'programKbtk'])->name('program.kbtk');
Route::get('/program/tahfid', [HomeController::class, 'programTahfid'])->name('program.tahfid');
Route::get('/program/tpa', [HomeController::class, 'programTpa'])->name('program.tpa');
Route::get('/agenda', [HomeController::class, 'agenda'])->name('agenda');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');

// SPMB
Route::get('/spmb', [HomeController::class, 'spmb'])->name('spmb');
Route::post('/spmb', [HomeController::class, 'storeSpmb'])->name('spmb.store');
Route::get('/spmb/sukses/{kode}', [HomeController::class, 'spmbSukses'])->name('spmb.sukses');

// Saran
Route::post('/saran', [HomeController::class, 'storeSaran'])->name('saran.store');

// =====================
// AUTH ROUTES
// =====================
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// =====================
// ADMIN ROUTES
// =====================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Beranda
    Route::get('/beranda', [BerandaController::class, 'edit'])->name('beranda.edit');
    Route::put('/beranda', [BerandaController::class, 'update'])->name('beranda.update');

    // Guru
    Route::resource('guru', GuruController::class)->except(['show']);

    // Fasilitas
    Route::resource('fasilitas', FasilitasController::class)
        ->except(['show'])
        ->parameters(['fasilitas' => 'fasilitas']);

    // Program
    Route::resource('program', ProgramController::class)->except(['show']);

    // Galeri
    Route::resource('galeri', GaleriController::class)
        ->except(['show'])
        ->parameters(['galeri' => 'galeri']);

    // Agenda
    Route::resource('agenda', AgendaController::class)->except(['show']);

    // Profil Sekolah
    Route::get('/profil/identitas', [ProfilController::class, 'editIdentitas'])->name('profil.identitas');
    Route::put('/profil/identitas', [ProfilController::class, 'updateIdentitas'])->name('profil.identitas.update');
    Route::get('/profil/visimisi', [ProfilController::class, 'editVisimisi'])->name('profil.visimisi');
    Route::put('/profil/visimisi', [ProfilController::class, 'updateVisimisi'])->name('profil.visimisi.update');

    // SPMB
    Route::get('/spmb', [SpmbController::class, 'index'])->name('spmb.index');
    Route::get('/spmb/{pendaftaran}', [SpmbController::class, 'show'])->name('spmb.show');
    Route::get('/spmb/{pendaftaran}/edit', [SpmbController::class, 'edit'])->name('spmb.edit');
    Route::put('/spmb/{pendaftaran}', [SpmbController::class, 'update'])->name('spmb.update');
    Route::patch('/spmb/{pendaftaran}/status', [SpmbController::class, 'updateStatus'])->name('spmb.status');
    Route::delete('/spmb/{pendaftaran}', [SpmbController::class, 'destroy'])->name('spmb.destroy');

    // Saran & Masukan
    Route::get('/saran', [SaranController::class, 'index'])->name('saran.index');
    Route::get('/saran/{saran}', [SaranController::class, 'show'])->name('saran.show');
    Route::delete('/saran/{saran}', [SaranController::class, 'destroy'])->name('saran.destroy');
    Route::patch('/saran/{saran}/baca', [SaranController::class, 'tandaiBaca'])->name('saran.baca');
});

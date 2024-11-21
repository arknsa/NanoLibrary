<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageBookController;
use App\Http\Controllers\ManagePeminjamanController;
use App\Http\Controllers\ManagePengembalianController;
use App\Http\Controllers\ManagePemesananController;
use App\Http\Controllers\ManageMahasiswaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RiwayatPeminjamanController;
use App\Http\Controllers\RiwayatPengembalianController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\MahasiswaDashboardController;


Route::get('/ruangbaca', [RoomController::class, 'index'])->name('reading-room.index');
Route::post('/reading-room/entry', [RoomController::class, 'entry'])->name('reading-room.entry');
Route::post('/reading-room/exit', [RoomController::class, 'exit'])->name('reading-room.exit');


Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('mhs.index');
})->name('home');

Route::get('/', [MahasiswaDashboardController::class, 'index'])->name('home');

Route::prefix('mhs')->group(function () {

    Route::get('aboutus', function () {
        return view('mhs.aboutus');
    })->name('mhs.aboutus');

    Route::get('/biodata/{ID_User}', [MahasiswaController::class, 'show'])->name('biodata.show')->middleware('auth');

    Route::get('layananbuku', [BookController::class, 'index']);

    Route::get('/detailbuku/{id}', [BookController::class, 'show']);

    Route::get('riwayatpeminjaman', [RiwayatPeminjamanController::class, 'riwayatPeminjaman'])
        ->name('mhs.riwayatpeminjaman')
        ->middleware('auth');

        Route::get('riwayatpengembalian', [RiwayatPengembalianController::class, 'riwayatPengembalian'])
        ->name('mhs.riwayatpengembalian');
});

Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');

Route::get('/sidebar', function () {
    return view('layouts.admin');
})->name('sbr');

Route::prefix('adm')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/', function () {
        return view('adm.index');
    })->name('adm-home');

    Route::get('/', [AdminDashboardController::class, 'index'])->name('adm-home');
    Route::resource('/adm-mahasiswa', ManageMahasiswaController::class);
    Route::resource('/adm-buku', ManageBookController::class);
    // Rute untuk Pemesanan
    Route::get('/pemesanan', [ManagePemesananController::class, 'index'])->name('admin.pemesanan.index');
    Route::get('/pemesanan/pinjamkan/{id}', [ManagePemesananController::class, 'pinjamkan'])->name('admin.pemesanan.pinjamkan');
    // Tambahkan rute lain jika diperlukan

    // Rute untuk Peminjaman
    Route::get('/peminjaman', [ManagePeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    Route::get('/peminjaman/dikembalikan/{id}', [ManagePeminjamanController::class, 'dikembalikan'])->name('admin.peminjaman.dikembalikan');
    // Tambahkan rute lain jika diperlukan

    // Rute untuk Pengembalian
    Route::get('/pengembalian', [ManagePengembalianController::class, 'index'])->name('admin.pengembalian.index');
    Route::delete('/pengembalian/{id}', [ManagePengembalianController::class, 'destroy'])->name('admin.pengembalian.destroy');
    // Tambahkan rute lain jika diperlukan
});

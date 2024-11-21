<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPeminjamanController extends Controller
{
    public function riwayatPeminjaman()
    {
        $userId = Auth::id();

        // Ambil data peminjaman yang aktif
        $peminjaman = Peminjaman::with('book')
            ->where('User_ID_User', $userId)
            ->get();

        // Ambil data pemesanan yang menunggu konfirmasi
        $pemesanan = Pemesanan::with('book')
            ->where('User_ID_User', $userId)
            ->get();

        // Gabungkan data
        $riwayat = collect();

        foreach ($pemesanan as $pesanan) {
            $riwayat->push((object)[
                'image' => $pesanan->book->Sampul,
                'title' => $pesanan->book->Judul,
                'no_peminjaman' => $pesanan->ID_Pemesanan,
                'tanggal_peminjaman' => $pesanan->Tanggal_Pemesanan,
                'tanggal_harus_kembali' => null,
                'status' => 'Menunggu Konfirmasi',
            ]);
        }

        foreach ($peminjaman as $pinjam) {
            $riwayat->push((object)[
                'image' => $pinjam->book->Sampul,
                'title' => $pinjam->book->Judul,
                'no_peminjaman' => $pinjam->ID_Peminjaman,
                'tanggal_peminjaman' => $pinjam->Tanggal_Peminjaman,
                'tanggal_harus_kembali' => $pinjam->Tenggat_Pengembalian,
                'status' => 'Dipinjam',
            ]);
        }

        // Urutkan berdasarkan tanggal peminjaman terbaru
        $riwayat = $riwayat->sortByDesc('tanggal_peminjaman');

        return view('mhs.riwayatpeminjaman', compact('riwayat'));
    }
}

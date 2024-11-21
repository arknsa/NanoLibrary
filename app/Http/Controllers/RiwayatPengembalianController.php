<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPengembalianController extends Controller
{
    public function riwayatPengembalian()
    {
        $userId = Auth::id();

        // Ambil data pengembalian untuk user yang sedang login
        $pengembalian = Pengembalian::with(['book'])
            ->where('User_ID_User', $userId)
            ->get();

        // Siapkan data untuk view
        $riwayat = $pengembalian->map(function($item) {
            return (object)[
                'image' => $item->book->Sampul,
                'title' => $item->book->Judul,
                'no_peminjaman' => $item->ID_Peminjaman ?? '-', // Sesuaikan dengan field yang ada
                'tanggal_peminjaman' => $item->Tanggal_Peminjaman,
                'tanggal_harus_kembali' => $item->Tenggat_Pengembalian,
                'tanggal_pengembalian' => $item->Tanggal_Pengembalian,
            ];
        });

        return view('mhs.riwayatpengembalian', compact('riwayat'));
    }
}

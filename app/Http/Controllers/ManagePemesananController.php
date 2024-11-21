<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ManagePemesananController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Mendapatkan nilai 'per_page' dari query string atau default ke 10

        if ($perPage == -1) {
            // Jika 'per_page' adalah -1, tampilkan semua entri
            $pemesanan = Pemesanan::with('user', 'book')->get();
        } else {
            // Gunakan paginate dengan jumlah per halaman yang ditentukan
            $pemesanan = Pemesanan::with('user', 'book')->paginate($perPage);
        }

        return view('adm.layanan_pemesanan', compact('pemesanan'));
    }


    public function pinjamkan($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $book = $pemesanan->book; // Menggunakan relasi untuk mendapatkan buku

        $peminjaman = new Peminjaman();
        $peminjaman->User_ID_User = $pemesanan->User_ID_User;
        $peminjaman->Buku_ID_Buku = $pemesanan->Buku_ID_Buku;
        $peminjaman->Tanggal_Peminjaman = Carbon::now();

        // Tentukan Tenggat_Pengembalian berdasarkan Akses
        if ($book->Akses == 'Dapat dipinjam') {
            // Tenggat 7 hari dari tanggal peminjaman
            $peminjaman->Tenggat_Pengembalian = Carbon::now()->addDays(7);
        } elseif ($book->Akses == 'Baca di tempat') {
            // Tenggat jam 4 sore pada hari yang sama
            $peminjaman->Tenggat_Pengembalian = Carbon::today()->setHour(16)->setMinute(0)->setSecond(0);
        }

        $peminjaman->save();

        // Kurangi stok buku jika diperlukan
        $book->Stok -= 1;
        $book->save();

        // Hapus pemesanan setelah dikonfirmasi
        $pemesanan->delete();

        // Set a unique session flash message
        session()->flash('peminjaman_success', 'Buku berhasil dipinjamkan!');

        // Redirect back to the Layanan Pemesanan page
        return redirect()->route('admin.pemesanan.index');
    }

}

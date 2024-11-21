<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ManagePeminjamanController extends Controller
{

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Mendapatkan nilai 'per_page' dari query string atau default ke 10

        if ($perPage == -1) {
            // Jika 'per_page' adalah -1, tampilkan semua entri
            $peminjaman = Peminjaman::with('user', 'book')->get();
        } else {
            // Gunakan paginate dengan jumlah per halaman yang ditentukan
            $peminjaman = Peminjaman::with('user', 'book')->paginate($perPage);
        }

        return view('adm.layanan_peminjaman', compact('peminjaman'));
    }


    public function dikembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $pengembalian = new Pengembalian();
        $pengembalian->User_ID_User = $peminjaman->User_ID_User;
        $pengembalian->Buku_ID_Buku = $peminjaman->Buku_ID_Buku;
        $pengembalian->Tanggal_Peminjaman = $peminjaman->Tanggal_Peminjaman;
        $pengembalian->Tenggat_Pengembalian = $peminjaman->Tenggat_Pengembalian;
        $pengembalian->Tanggal_Pengembalian = Carbon::now();

        $pengembalian->save();

        // Tambahkan kembali stok buku
        $book = $peminjaman->book;
        $book->Stok += 1;
        $book->save();

        // Hapus data peminjaman setelah dikembalikan
        $peminjaman->delete();

        // Set a unique session flash message
        session()->flash('pengembalian_success', 'Buku berhasil dikembalikan!');

        // Redirect back to the Layanan Peminjaman page
        return redirect()->route('admin.peminjaman.index');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ManagePengembalianController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Mendapatkan nilai 'per_page' dari query string atau default ke 10

        if ($perPage == -1) {
            // Jika 'per_page' adalah -1, tampilkan semua entri
            $pengembalian = Pengembalian::with('user', 'book')->get();
        } else {
            // Gunakan paginate dengan jumlah per halaman yang ditentukan
            $pengembalian = Pengembalian::with('user', 'book')->paginate($perPage);
        }

        return view('adm.layanan_pengembalian', compact('pengembalian'));
    }

    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Tambahkan data pengembalian
        Pengembalian::create([
            'User_ID_User' => $peminjaman->User_ID_User,
            'Buku_ID_Buku' => $peminjaman->Buku_ID_Buku,
            'Tanggal_Pengembalian' => now(),
        ]);

        // Hapus data peminjaman setelah dikembalikan
        $peminjaman->delete();

        return redirect()->route('admin.peminjaman.index')->with('success', 'Buku berhasil dikembalikan.');
    }

    public function destroy($id)
    {
        // Cari data pengembalian berdasarkan ID
        $pengembalian = Pengembalian::findOrFail($id);
    
        // Hapus data pengembalian
        $pengembalian->delete();
    
        // Redirect ke halaman daftar pengembalian dengan pesan sukses
        return redirect()->route('admin.pengembalian.index')->with('success', 'Data pengembalian berhasil dihapus.');
    }
    
}

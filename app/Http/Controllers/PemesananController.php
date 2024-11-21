<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PemesananController extends Controller
{

    public function index()
    {
        $pemesanan = Pemesanan::with('user', 'book')->get();
        return view('adm.layanan_pemesanan', compact('pemesanan'));
    }

    public function store(Request $request)
    {
        $book = Book::findOrFail($request->Buku_ID_Buku);

        // Cek apakah stok tersedia
        if ($book->Stok <= 0) {
            return redirect()->back()->with('error', 'Stok buku tidak tersedia.');
        }

        $pemesanan = new Pemesanan();
        $pemesanan->ID_Pemesanan = Str::random(8); // Generate a random ID
        $pemesanan->User_ID_User = auth()->id();
        $pemesanan->Buku_ID_Buku = $request->Buku_ID_Buku;
        $pemesanan->Tanggal_Pemesanan = now();

        $pemesanan->save();

        // Set flash data
        session()->flash('order_id', $pemesanan->ID_Pemesanan);
        session()->flash('pemesanan_success', 'Pemesanan berhasil dilakukan!');

        // Redirect back
        return redirect()->back();
    }

}

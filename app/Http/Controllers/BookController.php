<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::withCount('peminjaman', 'pemesanan')->get(); // Hitung jumlah peminjaman untuk setiap buku
        $books->each(function($book) {
            $book->stokTersedia = $book->Stok - $book->peminjaman_count - $book->pemesanan_count;
            $book->dipinjamCount = $book->peminjaman_count;
            $book-> dipesanCount = $book->pemesanan_count;
        });
        return view('mhs.layananbuku', compact('books'));
    }

    public function show($id)
    {
        $book = Book::withCount('peminjaman', 'pemesanan')->findOrFail($id);
        $dipinjamCount = $book->peminjaman_count;
        $dipesanCount = $book->pemesanan_count;
        $stokTersedia = $book->Stok - $dipinjamCount - $dipesanCount;

        return view('mhs.detailbuku', compact('book', 'dipinjamCount', 'dipesanCount', 'stokTersedia'));
    }
}

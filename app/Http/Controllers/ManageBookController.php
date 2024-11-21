<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ManageBookController extends Controller
{
    public function index()
    {
        $books = Book::withCount('peminjaman')->paginate(10); // Menghitung jumlah peminjaman per buku
        return view('adm.data_buku', compact('books'));
    }


    public function create()
    {
        return view('crud.book_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Judul' => 'required|string|max:255',
            'Sampul' => 'required|url',
            'Author' => 'nullable|string|max:255',
            'Deskripsi' => 'required|string',
            'Halaman' => 'required|integer|min:1',
            'Penerbit' => 'nullable|string|max:255',
            'Tahun' => 'nullable|integer|min:1000|max:' . (date('Y') + 1),
            'Berat' => 'nullable|integer|min:1',
            'ISBN' => 'nullable|string|max:20',
            'Lebar' => 'nullable|numeric|min:0',
            'Panjang' => 'nullable|numeric|min:0',
            'Bahasa' => 'required|string|max:50',
            'Kategori' => 'required|string|max:100',
            'Stok' => 'required|integer|min:0',
            'Akses' => 'required|in:Dapat dipinjam,Baca di tempat',
        ]);

        Book::create($request->all());

        return redirect()->route('adm-buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('crud.book_view', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('crud.book_edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Judul' => 'required|string|max:255',
            'Sampul' => 'required|url',
            'Author' => 'nullable|string|max:255',
            'Deskripsi' => 'required|string',
            'Halaman' => 'required|integer|min:1',
            'Penerbit' => 'nullable|string|max:255',
            'Tahun' => 'nullable|integer|min:1000|max:' . (date('Y') + 1),
            'Berat' => 'nullable|integer|min:1',
            'ISBN' => 'nullable|string|max:20',
            'Lebar' => 'nullable|numeric|min:0',
            'Panjang' => 'nullable|numeric|min:0',
            'Bahasa' => 'required|string|max:50',
            'Kategori' => 'required|string|max:100',
            'Stok' => 'required|integer|min:0',
            'Akses' => 'required|in:Dapat dipinjam,Baca di tempat',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('adm-buku.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('adm-buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
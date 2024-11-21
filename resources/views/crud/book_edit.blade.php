@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-5">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    </div>

    <!-- FORM SECTION -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="table-responsive bg-white p-4 rounded shadow-sm">
          <h2 class="mb-4 text-center">Edit Data Buku</h2>

          <!-- Update Book Form -->
          <form action="{{ route('adm-buku.update', $book->ID_Buku) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="Judul">Judul</label>
              <input type="text" class="form-control" id="Judul" name="Judul" value="{{ $book->Judul }}" maxlength="255" required>
            </div>

            <div class="form-group">
              <label for="Author">Author</label>
              <input type="text" class="form-control" id="Author" name="Author" value="{{ $book->Author }}" maxlength="100">
            </div>

            <div class="form-group">
              <label for="Sampul">Sampul (URL)</label>
              <input type="url" class="form-control" id="Sampul" name="Sampul" value="{{ $book->Sampul }}" maxlength="255" required>
            </div>

            <div class="form-group">
              <label for="Deskripsi">Deskripsi</label>
              <textarea class="form-control" id="Deskripsi" name="Deskripsi" maxlength="999" required>{{ $book->Deskripsi }}</textarea>
            </div>

            <div class="form-group">
              <label for="Halaman">Halaman</label>
              <input type="text" class="form-control" id="Halaman" name="Halaman" value="{{ $book->Halaman }}" maxlength="255" required>
            </div>

            <div class="form-group">
              <label for="Penerbit">Penerbit</label>
              <input type="text" class="form-control" id="Penerbit" name="Penerbit" value="{{ $book->Penerbit }}" maxlength="255">
            </div>

            <div class="form-group">
              <label for="Tahun">Tahun</label>
              <input type="number" class="form-control" id="Tahun" name="Tahun" value="{{ $book->Tahun }}">
            </div>

            <div class="form-group">
              <label for="Berat">Berat</label>
              <input type="number" class="form-control" id="Berat" name="Berat" value="{{ $book->Berat }}">
            </div>

            <div class="form-group">
              <label for="ISBN">ISBN</label>
              <input type="number" class="form-control" id="ISBN" name="ISBN" value="{{ $book->ISBN }}">
            </div>

            <div class="form-group">
              <label for="Lebar">Lebar</label>
              <input type="number" class="form-control" id="Lebar" name="Lebar" value="{{ $book->Lebar }}">
            </div>

            <div class="form-group">
              <label for="Panjang">Panjang</label>
              <input type="number" class="form-control" id="Panjang" name="Panjang" value="{{ $book->Panjang }}">
            </div>

            <div class="form-group">
              <label for="Bahasa">Bahasa</label>
              <input type="text" class="form-control" id="Bahasa" name="Bahasa" value="{{ $book->Bahasa }}" maxlength="255" required>
            </div>

            <div class="form-group">
              <label for="Kategori">Kategori</label>
              <input type="text" class="form-control" id="Kategori" name="Kategori" value="{{ $book->Kategori }}" maxlength="255" required>
            </div>

            <div class="form-group">
              <label for="Stok">Stok</label>
              <input type="number" class="form-control" id="Stok" name="Stok" value="{{ $book->Stok }}" required>
            </div>

            <div class="form-group">
              <label for="Akses">Akses</label>
              <select class="form-control" id="Akses" name="Akses" required>
                <option value="Dapat dipinjam" {{ $book->Akses == 'Dapat dipinjam' ? 'selected' : '' }}>Dapat dipinjam</option>
                <option value="Baca di tempat" {{ $book->Akses == 'Baca di tempat' ? 'selected' : '' }}>Baca di tempat</option>
              </select>
            </div>

            <div class="form-group">
              <a href="{{ route('adm-buku.index') }}" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary ml-2">Update Buku</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

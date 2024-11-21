@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-5">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    </div>
    
    <!-- BOOK DETAILS SECTION -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="table-responsive bg-white p-4 rounded shadow-sm">
        <h2 class="mb-4 text-center">Detail Data Buku</h2>
          <div class="row g-5">
            <div class="col-lg-12">
              <h1 class="mb-2">{{ $book->Judul }}</h1>
              <h4 class="text-secondary mb-3">{{ $book->Author ?? 'N/A' }}</h4>
            </div>
          </div>
          <div class="row g-5">
            <div class="col-lg-5">
              <img class="img-fluid align-items-center" src="{{ asset($book->Sampul) }}" alt="Book Image" width="100%">
            </div>
            <div class="col-lg-7">
              <h4 class="mb-3">Deskripsi Buku</h4>
              <p class="mb-4" style="text-align: justify;">
                {{ $book->Deskripsi }}
              </p>

              <h4 class="mb-3">Detail Buku</h4>
              <div class="row mb-4">
                <div class="col-md-6">
                  <ul class="list-unstyled">
                    <li><strong>Jumlah Halaman:</strong><br>{{ $book->Halaman }} halaman</li>
                    <li><strong>Penerbit:</strong><br>{{ $book->Penerbit ?? 'N/A' }}</li>
                    <li><strong>Tahun Terbit:</strong><br>{{ $book->Tahun ?? 'N/A' }}</li>
                    <li><strong>Berat:</strong><br>{{ $book->Berat ?? 'N/A' }} gram</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="list-unstyled">
                    <li><strong>ISBN:</strong><br>{{ $book->ISBN ?? 'N/A' }}</li>
                    <li><strong>Lebar:</strong><br>{{ $book->Lebar ?? 'N/A' }} cm</li>
                    <li><strong>Panjang:</strong><br>{{ $book->Panjang ?? 'N/A' }} cm</li>
                    <li><strong>Bahasa:</strong><br>{{ $book->Bahasa }}</li>
                  </ul>
                </div>
              </div>
              
              <p class="card-text"><strong>Kategori:</strong> {{ $book->Kategori }}</p>
              <p class="card-text"><strong>Stok:</strong> {{ $book->Stok }}</p>
              <p class="card-text"><strong>Akses:</strong> {{ $book->Akses }}</p>
              
              <div class="form-group">
                <a href="{{ route('adm-buku.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('adm-buku.edit', $book->ID_Buku) }}" class="btn btn-warning ml-2">Edit</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

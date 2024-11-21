@extends('layouts.app')

@section('content')

<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-12">
                <h1 class="mb-2">{{ $book->Judul }}</h1>
                <h4 class="text-secondary mb-3">{{ $book->Author }}</h4>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-5">
                <img class="img-fluid align-items-center" src="{{ asset($book->Sampul) }}" alt="Book Image" width="100%">
            </div>
            <div class="col-lg-7">
                <h4 class="mb-3">Deskripsi Buku</h4>
                <p class="mb-4" style="text-align: justify;">{{ $book->Deskripsi }}</p>

                <h4 class="mb-3">Detail Buku</h4>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li><strong>Jumlah Halaman</strong><br>{{ $book->Halaman }} halaman</li>
                            <li><strong>Penerbit</strong><br>{{ $book->Penerbit }}</li>
                            <li><strong>Tanggal Terbit</strong><br>{{ $book->Tahun }}</li>
                            <li><strong>Berat</strong><br>{{ $book->Berat }} gr</li>
                            <li><strong>Akses</strong><br>{{ $book->Akses }}</li>

                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li><strong>ISBN</strong><br>{{ $book->ISBN }}</li>
                            <li><strong>Lebar</strong><br>{{ $book->Lebar }} cm</li>
                            <li><strong>Panjang</strong><br>{{ $book->Panjang }} cm</li>
                            <li><strong>Bahasa</strong><br>{{ $book->Bahasa }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Tampilkan pesan sukses atau error -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('pemesanan_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('pemesanan_success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <div class="d-flex gap-3 mt-3">
                    @if(auth()->check())
                        @if($stokTersedia > 0)
                            <button class="btn btn-primary rounded px-4" data-bs-toggle="modal" data-bs-target="#borrowModal">
                                Pesan Buku
                            </button>
                        @else
                            <button class="btn btn-secondary rounded px-4" disabled>
                                Buku Habis
                            </button>
                        @endif
                    @else
                        <button class="btn btn-primary rounded px-4" onclick="toggleModal('loginModal')">Pesan Buku</button>
                    @endif
                </div>

                <h4 class="mt-4">Status Buku</h4>
                <div class="overflow-x-auto mt-3">
                    <table class="min-w-full bg-white rounded-lg shadow-md">
                        <thead class="bg-gray-200 rounded-t-lg">
                            <tr>
                                <th class="py-3 px-5 text-left">Status</th>
                                <th class="py-3 px-5 text-left">Jumlah Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-3 px-5">Tersedia</td>
                                <td class="py-3 px-5">{{ $stokTersedia }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 px-5">Dipesan</td>
                                <td class="py-3 px-5">{{ $dipesanCount }}</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-5">Dipinjam</td>
                                <td class="py-3 px-5">{{ $dipinjamCount }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="loginModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-8 rounded-lg shadow-lg w-96">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" name="redirect_to" value="{{ request()->fullUrl() }}">
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Email-20xx@ftmm.unair.ac.id"
                            value="{{ old('Email') }}" required autofocus>
                    </div>
                    <!-- Password -->
                    <div class="mb-4">
                        <label for="Password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Minimal 8 Karakter"
                            required>
                    </div>
                    <!-- Remember Me -->
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ingat Saya</label>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn w-100 py-2" style="background-color: #1E90FF; color: white;">Masuk</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Peminjaman -->
    <div class="modal fade" id="borrowModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-m"> <!-- Mengubah ukuran modal menjadi lebih kecil -->
            <div class="modal-content" style="background: rgba(20, 24, 62, 0.7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn btn-square bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h3 class="flex items-center justify-center modal-title text-white">Konfirmasi</h3>
                <div class="modal-body p-4"> <!-- Memberikan padding yang lebih kecil -->

                    @if ($book->Akses == 'Dapat dipinjam')
                    <!-- Form untuk buku yang dapat dipinjam -->
                    <form method="POST" action="{{ route('pemesanan.store') }}">
                        @csrf
                        <input type="hidden" name="Buku_ID_Buku" value="{{ $book->ID_Buku }}">

                        <!-- Nama Buku -->
                        <div class="mb-3">
                            <label class="form-label text-white small">Nama Buku</label> <!-- Gunakan ukuran teks lebih kecil -->
                            <input type="text" class="form-control form-control-sm" value="{{ $book->Judul }}" readonly>
                        </div>

                        <!-- Pengarang -->
                        <div class="mb-3">
                            <label class="form-label text-white small">Pengarang</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $book->Author }}" readonly>
                        </div>

                        <!-- Lama Peminjaman -->
                        <div class="mb-3">
                            <label class="form-label text-white small">Lama Peminjaman (hari)</label>
                            <input type="text" class="form-control form-control-sm" value="7 Hari" readonly>
                        </div>

                        <!-- Tombol Konfirmasi -->
                        <button type="submit" class="btn w-100 py-2 mb-3" style="background-color: #1E90FF; color: white;">Konfirmasi Pemesanan</button>
                    </form>

                    @elseif ($book->Akses == 'Baca di tempat')
                    <!-- Form untuk buku yang hanya dapat dibaca di tempat -->
                    <form method="POST" action="{{ route('pemesanan.store') }}">
                        @csrf
                        <input type="hidden" name="Buku_ID_Buku" value="{{ $book->ID_Buku }}">

                        <!-- Nama Buku -->
                        <div class="mb-3">
                            <label class="form-label text-white small">Nama Buku</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $book->Judul }}" readonly>
                        </div>

                        <!-- Pengarang -->
                        <div class="mb-3">
                            <label class="form-label text-white small">Pengarang</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $book->Author }}" readonly>
                        </div>

                        <!-- Informasi Baca di Tempat -->
                        <div class="mb-3">
                            <label class="form-label text-white small">Informasi</label>
                            <p class="text-white small">Buku ini hanya dapat dibaca di tempat dan harus dikembalikan sebelum jam 4 sore hari ini.</p>
                        </div>

                        <!-- Tombol Konfirmasi -->
                        <button type="submit" class="btn w-100 py-2 mb-3" style="background-color: #1E90FF; color: white;">Konfirmasi Pemesanan</button>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }

    setTimeout(function() {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('hide');
        }
    }, 3000); // Menghilangkan setelah 3 detik

</script>

@endsection

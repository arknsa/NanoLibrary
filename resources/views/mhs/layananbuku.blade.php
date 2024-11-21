@extends('layouts.app')

@section('content')
<!-- Book Collection-->
<div class="container-fluid fruite py-4">
    <div class="container py-4">
        <h1 class="mb-4">Koleksi Buku Ruang Baca FTMM</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <!-- Search bar -->
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" id="search-input" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    
                    <!-- Spacing between search bar and dropdowns -->
                    <div class="col-3"></div>

                    <!-- Category dropdown -->
                    <div class="col-xl-3">
                        <div class="bg-light rounded p-3 mb-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <label for="Kategori" class="mb-0 me-2">Kategori:</label>
                                <select id="Kategori" name="kategori" class="form-select form-select-sm border-0 bg-light category-select">
                                    <option value="">Semua</option> <!-- Value kosong untuk "Semua" -->
                                    @foreach($books->unique('Kategori') as $book)
                                        <option value="{{ strtolower(trim($book->Kategori)) }}">{{ $book->Kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Sorting dropdown -->
                    <div class="col-xl-3">
                        <div class="bg-light rounded p-3 mb-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <label for="Sorting" class="mb-0 me-2">Urutkan:</label>
                                <select id="Sorting" name="sorting" class="form-select form-select-sm border-0 bg-light category-select">
                                    <option value="nothing">Nothing</option>
                                    <option value="stok">Stok Tersedia</option>
                                    <option value="dipinjam">Dipinjam</option>
                                    <option value="dipesan">Dipesan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Cards -->
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 g-3" id="book-collection">
                    @foreach($books as $book)
                    <div class="col book-item"
                        data-title="{{ strtolower($book->Judul) }}"
                        data-author="{{ strtolower($book->Author) }}"
                        data-stok="{{ $book->stokTersedia }}"
                        data-dipinjam="{{ $book->dipinjamCount }}"
                        data-dipesan="{{ $book->dipesanCount }}"
                        data-kategori="{{ strtolower(trim($book->Kategori)) }}"> <!-- Gunakan strtolower dan trim -->
                        <div class="card h-100 book-card" onclick="window.location.href='/mhs/detailbuku/{{ $book->ID_Buku }}'">                              
                            <div class="position-relative">
                                <img src="{{ asset($book->Sampul) }}" class="card-img-top" alt="{{ $book->Judul }}">
                                <span class="badge bg-secondary position-absolute top-0 start-0 m-2">{{ $book->Kategori }}</span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-center mb-2">{{ $book->Judul }}</h5>
                                <p class="card-text text-center mt-auto">{{ $book->Author }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Style -->
<style>
.book-card {
    transition: transform 0.2s;
    cursor: pointer;
}
.book-card:hover {
    transform: scale(1.03);
}
.card-img-top {
    height: 200px;
    object-fit: cover;
}
.card-body {
    height: 120px;
    overflow: hidden;
}
.card-title {
    font-size: 1rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.card-text {
    font-size: 0.9rem;
}
.category-select {
    max-width: 150px;
    width: 100%;
}
</style>
<!-- Custom JavaScript for Searching and Filtering -->
<script>
    // Simpan referensi ke elemen input dan dropdown
    const searchInput = document.getElementById('search-input');
    const categorySelect = document.getElementById('Kategori');
    const sortingSelect = document.getElementById('Sorting');

    // Fungsi untuk memfilter dan menampilkan buku
    function filterBooks() {
        let searchFilter = searchInput.value.toLowerCase().trim();
        let selectedCategory = categorySelect.value.toLowerCase().trim();
        let books = document.querySelectorAll('.book-item');

        books.forEach(function(book) {
            let title = book.getAttribute('data-title');
            let author = book.getAttribute('data-author');
            let bookCategory = book.getAttribute('data-kategori');

            // Logika untuk menentukan apakah buku harus ditampilkan
            let matchesSearch = title.includes(searchFilter) || author.includes(searchFilter);
            let matchesCategory = selectedCategory === '' || bookCategory === selectedCategory;

            if (matchesSearch && matchesCategory) {
                book.style.display = 'block'; // Pastikan elemen ditampilkan
            } else {
                book.style.display = 'none';
            }
        });

        // Setelah memfilter, lakukan sorting
        sortBooks();
    }

    // Fungsi untuk sorting buku
    function sortBooks() {
        let sorting = sortingSelect.value;
        let container = document.getElementById('book-collection');
        let bookItems = Array.from(container.querySelectorAll('.book-item')).filter(function(book) {
            return book.style.display !== 'none';
        });

        if (sorting === 'nothing') {
            // Tidak ada sorting, urutkan berdasarkan judul (opsional)
            bookItems.sort((a, b) => a.dataset.title.localeCompare(b.dataset.title));
        } else if (sorting === 'stok') {
            bookItems.sort((a, b) => b.dataset.stok - a.dataset.stok);
        } else if (sorting === 'dipinjam') {
            bookItems.sort((a, b) => b.dataset.dipinjam - a.dataset.dipinjam);
        } else if (sorting === 'dipesan') {
            bookItems.sort((a, b) => b.dataset.dipesan - a.dataset.dipesan);
        }

        // Update the DOM with the sorted elements
        container.innerHTML = '';  // Clear existing content
        bookItems.forEach(item => container.appendChild(item));  // Append sorted items
    }

    // Event listener untuk pencarian
    searchInput.addEventListener('input', filterBooks);

    // Event listener untuk dropdown kategori
    categorySelect.addEventListener('change', filterBooks);

    // Event listener untuk sorting
    sortingSelect.addEventListener('change', function() {
        // Ketika sorting berubah, hanya perlu melakukan sorting ulang tanpa memfilter ulang
        sortBooks();
    });

    // Panggil filterBooks saat halaman pertama kali dimuat untuk menampilkan semua buku
    document.addEventListener('DOMContentLoaded', filterBooks);
</script>
@endsection

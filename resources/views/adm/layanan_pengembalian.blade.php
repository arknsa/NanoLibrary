@extends('layouts.admin')

@section('content')

@php
    use Carbon\Carbon;
@endphp

<div class="container mt-5 pt-5">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <!-- Anda dapat menambahkan tombol atau kontrol tambahan di sini jika diperlukan -->
        </div>

        <!-- Table Section Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="table-responsive bg-white p-4 rounded shadow-sm">
                    <h2 class="mb-4 text-center">Data Pengembalian</h2>

                    <!-- Search and Pagination Controls -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <!-- Dropdown untuk mengubah jumlah baris yang ditampilkan -->
                        <div class="dataTables_length">
                            <label>
                                Show 
                                <select id="entriesSelectPengembalian" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                    <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                    <option value="-1" {{ request('per_page') == -1 ? 'selected' : '' }}>All</option>
                                </select> 
                                entries
                            </label>
                        </div>

                        <!-- Input pencarian -->
                        <div class="dataTables_filter d-flex">
                            <label class="me-2">
                                Search:
                            </label>
                            <input type="search" id="searchInputPengembalian" class="form-control form-control-sm" placeholder="Cari Pengembalian..." aria-controls="dataPengembalianTable">
                        </div>
                    </div>

                    <!-- Table Section -->
                    <table id="dataPengembalianTable" class="table table-hover table-striped align-middle text-center">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>No. Pengembalian</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tenggat Pengembalian</th>
                                <th>Status</th>
                                <th>Tanggal Dikembalikan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengembalian as $index => $item)
                            <tr>
                                <td>{{ $pengembalian instanceof \Illuminate\Pagination\LengthAwarePaginator ? $pengembalian->firstItem() + $index : $loop->iteration }}</td>
                                <td>{{ $item->ID_Pengembalian }}</td>
                                <td>{{ $item->user->NIM }}</td>
                                <td>{{ $item->user->Nama }}</td>
                                <td>{{ $item->book->Judul }}</td>
                                <td>{{ Carbon::parse($item->Tanggal_Peminjaman)->format('d-m-Y') }}</td>
                                <td>{{ Carbon::parse($item->Tenggat_Pengembalian)->format('d-m-Y') }}</td>
                                <td>Dikembalikan</td>
                                <td>{{ Carbon::parse($item->Tanggal_Pengembalian)->format('d-m-Y') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <form action="{{ route('admin.pengembalian.destroy', $item->ID_Pengembalian) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pengembalian ini?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>                              
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center">Tidak ada data pengembalian ditemukan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>


                    <!-- Pagination controls -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="dataTables_info" role="status" aria-live="polite">
                            @if($pengembalian instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                Menampilkan {{ $pengembalian->firstItem() }} sampai {{ $pengembalian->lastItem() }} dari {{ $pengembalian->total() }} entri
                            @else
                                Menampilkan {{ $pengembalian->count() }} entri
                            @endif
                        </div>
                        <div class="dataTables_paginate paging_simple_numbers">
                            @if($pengembalian instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $pengembalian->appends(['per_page' => request('per_page')])->links() }} <!-- Laravel's pagination links dengan parameter per_page -->
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan style kustom untuk membuat dropdown lebih lebar -->
<style>
    .dataTables_length select {
        width: auto;
        padding: 5px 10px;
        font-size: 1rem;
    }
    mark {
        background-color: yellow;
        color: black;
    }
</style>

<!-- JavaScript untuk Pencarian dan Pagination Sisi Klien -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInputPengembalian');
    const table = document.getElementById('dataPengembalianTable');
    const tbody = table.getElementsByTagName('tbody')[0];
    const rows = tbody.getElementsByTagName('tr');

    // Indeks kolom yang akan dicari (0-based)
    // No. Pengembalian (1), NIM (2), Nama (3), Judul Buku (4), Tanggal Peminjaman (5), Tenggat Pengembalian (6), Status (7), Tanggal Dikembalikan (8)
    const searchColumns = [1, 2, 3, 4, 5, 6, 7, 8];

    // Fungsi Debounce untuk membatasi frekuensi pemanggilan fungsi pencarian.
    function debounce(func, delay) {
        let debounceTimer;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => func.apply(context, args), delay);
        };
    }

    // Fungsi untuk Menyorot Teks yang Cocok
    function highlightText(element, text) {
        const innerHTML = element.innerHTML;
        const index = innerHTML.toLowerCase().indexOf(text.toLowerCase());
        if (index >= 0 && text !== '') { 
            element.innerHTML = innerHTML.substring(0, index) + "<mark>" + innerHTML.substring(index, index + text.length) + "</mark>" + innerHTML.substring(index + text.length);
        }
    }

    // Fungsi untuk Menghapus Semua Sorotan
    function clearHighlights() {
        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            for (let j = 0; j < searchColumns.length; j++) {
                const cell = cells[searchColumns[j]];
                if (cell) {
                    cell.innerHTML = cell.innerText; // Hapus tag <mark>
                }
            }
        }
    }

    // Fungsi Pencarian
    const performSearch = debounce(function() {
        const filter = searchInput.value.toLowerCase();

        clearHighlights();

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let match = false;

            for (let j = 0; j < searchColumns.length; j++) {
                const cell = cells[searchColumns[j]];
                if (cell) {
                    const text = cell.textContent || cell.innerText;
                    if (text.toLowerCase().indexOf(filter) > -1) {
                        match = true;
                        // Sorot teks yang cocok
                        highlightText(cell, filter);
                        break;
                    }
                }
            }

            if (match || filter === '') {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }, 300); // Penundaan debounce 300 milidetik

    searchInput.addEventListener('keyup', performSearch);

    // Handle 'Show entries' dropdown
    const entriesSelect = document.getElementById('entriesSelectPengembalian');

    entriesSelect.addEventListener('change', function() {
        const selectedValue = this.value;
        if (selectedValue == -1) {
            // Muat ulang halaman dengan parameter 'per_page' diatur ke -1 untuk menampilkan semua entri
            const url = new URL(window.location.href);
            url.searchParams.set('per_page', -1);
            window.location.href = url.toString();
        } else {
            // Muat ulang halaman dengan nilai 'per_page' yang dipilih
            const url = new URL(window.location.href);
            url.searchParams.set('per_page', selectedValue);
            window.location.href = url.toString();
        }
    });

    // Atur dropdown ke nilai 'per_page' saat ini dari URL atau default
    (function setEntriesSelect() {
        const urlParams = new URLSearchParams(window.location.search);
        const perPage = urlParams.get('per_page') || '10';
        entriesSelect.value = perPage;
    })();
});
</script>

@endsection

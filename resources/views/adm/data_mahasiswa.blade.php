@extends('layouts.admin')

@section('content')

<div class="container mt-5 pt-5">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <!-- Anda dapat menambahkan tombol atau kontrol tambahan di sini jika diperlukan -->
    </div>

    <!-- Table Section Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="bg-white p-4 rounded shadow-sm">
          <h2 class="mb-4 text-center">Data Mahasiswa</h2>

          <!-- Search and Pagination Form -->
          <form id="mahasiswaForm" class="d-flex justify-content-between align-items-center mb-3">
              <!-- Dropdown untuk mengubah jumlah baris yang ditampilkan -->
              <div class="dataTables_length">
                  <label>
                      Show 
                      <select id="entriesSelectMahasiswa" class="custom-select custom-select-sm form-control form-control-sm">
                          <option value="5">5</option>
                          <option value="10" selected>10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                          <option value="-1">All</option>
                      </select> 
                      entries
                  </label>
              </div>

              <!-- Input pencarian -->
              <div class="dataTables_filter d-flex">
                  <label class="me-2">
                      Search:
                  </label>
                  <input type="search" id="searchInputMahasiswa" class="form-control form-control-sm" placeholder="Cari Mahasiswa..." aria-controls="dataMahasiswaTable">
                  <!-- Opsional: Anda dapat menambahkan tombol pencarian jika diinginkan -->
                  <!-- <button type="button" class="btn btn-primary btn-sm ms-2" id="searchButtonMahasiswa">Search</button> -->
              </div>
          </form>

          <!-- Table Section -->
          <div class="table-responsive">
            <table id="dataMahasiswaTable" class="table table-hover table-striped align-middle text-center">
              <thead class="bg-primary text-white">
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Program Studi</th>
                  <th>Angkatan</th>
                  <th>Email</th>
                  <th>No. Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mahasiswas as $index => $mahasiswa)
                <tr>
                  <td>{{ $mahasiswas->firstItem() + $index }}</td>
                  <td>{{ $mahasiswa->NIM }}</td>
                  <td>{{ $mahasiswa->Nama }}</td>
                  <td>{{ $mahasiswa->Program_Studi }}</td>
                  <td>{{ $mahasiswa->Angkatan }}</td>
                  <td>{{ $mahasiswa->Email }}</td>
                  <td>{{ $mahasiswa->No_Telp }}</td>
                  <td>
                    <div class="d-flex justify-content-center">
                      <!-- Tombol View -->
                      <a href="{{ route('adm-mahasiswa.show', $mahasiswa->ID_User) }}" class="btn btn-outline-primary btn-sm me-2" title="View">
                        <i class="fas fa-eye"></i>
                      </a>
                      <!-- Tombol Delete -->
                      <form action="{{ route('adm-mahasiswa.destroy', $mahasiswa->ID_User) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?');" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <!-- Pagination controls -->
          <div class="d-flex justify-content-between align-items-center mt-3">
              <div class="dataTables_info" role="status" aria-live="polite">
                  Menampilkan {{ $mahasiswas->firstItem() ?? 0 }} sampai {{ $mahasiswas->lastItem() ?? 0 }} dari {{ $mahasiswas->total() }} entri
              </div>
              <div class="dataTables_paginate paging_simple_numbers">
                  {{ $mahasiswas->links() }} <!-- Laravel's pagination links -->
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
</style>

<!-- JavaScript untuk Pencarian Sisi Klien -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInputMahasiswa');
    const table = document.getElementById('dataMahasiswaTable');
    const tbody = table.getElementsByTagName('tbody')[0];
    const rows = tbody.getElementsByTagName('tr');

    const searchColumns = [1, 2, 3, 4, 5, 6]; // NIM, Nama, Program Studi, Angkatan, Email, No. Telepon

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

    // Menangani dropdown 'Show entries'
    const entriesSelect = document.getElementById('entriesSelectMahasiswa');

    entriesSelect.addEventListener('change', function() {
        const selectedValue = entriesSelect.value;
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

    // Opsional: Atur dropdown ke nilai 'per_page' saat ini dari URL atau default
    (function setEntriesSelect() {
        const urlParams = new URLSearchParams(window.location.search);
        const perPage = urlParams.get('per_page') || '10';
        entriesSelect.value = perPage;
    })();
});
</script>

@endsection

@extends('layouts.admin')

@section('content')

<div class="container mt-4 pt-5">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div class="py-2 py-md-0">
        <a href="{{ route('adm-buku.create') }}" class="btn btn-primary btn-round">Tambah Buku</a>
      </div>
    </div>
  </div>

    <!-- Table Section Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="bg-white p-4 rounded shadow-sm">
          <h2 class="mb-4 text-center">Data Buku</h2>

          <!-- Search and Pagination Controls -->
          <div class="d-flex justify-content-between align-items-center mb-3">
              <!-- Dropdown to change the number of rows displayed -->
              <div class="dataTables_length">
                  <label>
                      Show 
                      <select id="entriesSelect" class="custom-select custom-select-sm form-control form-control-sm">
                          <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                          <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                          <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                          <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                          <option value="-1" {{ request('per_page') == -1 ? 'selected' : '' }}>All</option>
                      </select> 
                      entries
                  </label>
              </div>

              <!-- Search input -->
              <div class="dataTables_filter d-flex">
                  <label class="me-2">
                      Search:
                  </label>
                  <input type="search" id="searchInput" class="form-control form-control-sm" placeholder="Cari Buku..." aria-controls="dataBukuTable">
              </div>
          </div>

          <!-- Table Section -->
          <div class="table-responsive">
            <table id="dataBukuTable" class="table table-hover table-striped align-middle text-center">
              <thead class="bg-primary text-white">
                <tr>
                  <th>No.</th>
                  <th>Sampul</th>
                  <th>Judul</th>
                  <th>Author</th>
                  <th>Tahun</th>
                  <th>Kategori</th>
                  <th>Halaman</th>
                  <th>Penerbit</th>
                  <th>ISBN</th>
                  <th>Stok</th>
                  <th>Dipinjam</th>
                  <th>Akses</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($books as $book)
                <tr>
                  <td>{{ $books->firstItem() + $loop->index }}</td>
                  <td><img src="{{ asset($book->Sampul) }}" alt="Cover {{ $book->Judul }}" class="img-thumbnail" style="width: 80px; height: auto;"></td>
                  <td>{{ $book->Judul }}</td>
                  <td>{{ $book->Author }}</td>
                  <td>{{ $book->Tahun }}</td>
                  <td>{{ $book->Kategori }}</td>
                  <td>{{ $book->Halaman }}</td>
                  <td>{{ $book->Penerbit }}</td>
                  <td>{{ $book->ISBN }}</td>
                  <td>{{ $book->Stok }}</td>
                  <td>{{ $book->peminjaman_count }}</td>
                  <td>{{ $book->Akses }}</td> <!-- Menampilkan jumlah peminjaman -->
                  <td>
                    <div class="d-flex justify-content-center">
                      <a href="{{ route('adm-buku.show', $book->ID_Buku) }}" class="btn btn-outline-primary btn-sm me-2" title="View">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('adm-buku.edit', $book->ID_Buku) }}" class="btn btn-outline-warning btn-sm me-2" title="Edit">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{ route('adm-buku.destroy', $book->ID_Buku) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');" class="d-inline">
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
                  <td colspan="12" class="text-center">Tidak ada data buku ditemukan.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <!-- Pagination controls -->
          <div class="d-flex justify-content-between align-items-center mt-3">
              <div class="dataTables_info" role="status" aria-live="polite">
                  Menampilkan {{ $books->firstItem() ?? 0 }} sampai {{ $books->lastItem() ?? 0 }} dari {{ $books->total() }} entri
              </div>
              <div class="dataTables_paginate paging_simple_numbers">
                  {{ $books->links() }} <!-- Laravel's pagination links -->
              </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add custom style to make the dropdown wider -->
<style>
.dataTables_length select {
    width: auto;
    padding: 5px 10px;
    font-size: 1rem;
}
</style>

<!-- JavaScript for Client-Side Search -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('dataBukuTable');
    const tbody = table.getElementsByTagName('tbody')[0];
    const rows = tbody.getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toLowerCase();

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let match = false;

            // Iterate through relevant columns to search (e.g., Judul, Author, Kategori)
            // Assuming Judul is column index 2, Author is 3, Kategori is 5
            const searchColumns = [2, 3, 5];

            for (let j = 0; j < searchColumns.length; j++) {
                const cell = cells[searchColumns[j]];
                if (cell) {
                    const text = cell.textContent || cell.innerText;
                    if (text.toLowerCase().indexOf(filter) > -1) {
                        match = true;
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
    });

    // Optional: Handle 'Show entries' dropdown
    const entriesSelect = document.getElementById('entriesSelect');

    entriesSelect.addEventListener('change', function() {
        const selectedValue = entriesSelect.value;
        // If 'All' is selected, set display to show all entries
        if (selectedValue == -1) {
            // Optionally, reload the page with 'per_page' parameter set to -1
            // Since we are not modifying the controller, 'All' might already be handled
            // Alternatively, adjust table display to show all rows if all data is loaded
            // Given server-side pagination, 'All' likely triggers server to send all data
            // So no action needed here
        } else {
            // Reload the page with the selected 'per_page' value
            const url = new URL(window.location.href);
            url.searchParams.set('per_page', selectedValue);
            window.location.href = url.toString();
        }
    });
});
</script>

@endsection

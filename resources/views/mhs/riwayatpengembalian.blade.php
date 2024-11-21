@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="container mx-auto py-5">
    <h2 class="text-3xl font-bold text-black text-center mb-4">Riwayat Pengembalian Buku</h2>
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-xl">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="border-b border-gray-200 bg-gray-100 p-4">
                        <tr>
                            <th class="px-4 py-2 text-left">Sampul</th>
                            <th class="px-4 py-2 text-left">Judul</th>
                            <th class="px-4 py-2 text-left">No. Peminjaman</th>
                            <th class="px-4 py-2 text-left">Tanggal Peminjaman</th>
                            <th class="px-4 py-2 text-left">Tenggat Pengembalian</th>
                            <th class="px-4 py-2 text-left">Tanggal Pengembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat as $item)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">
                                <img src="{{ $item->image }}" alt="Foto Buku" class="w-16 h-16 object-cover rounded">
                            </td>
                            <td class="px-4 py-2">{{ $item->title }}</td>
                            <td class="px-4 py-2">#{{ $item->no_peminjaman }}</td>
                            <td class="px-4 py-2">
                                {{ $item->tanggal_peminjaman ? \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d/m/Y') : '-' }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $item->tanggal_harus_kembali ? \Carbon\Carbon::parse($item->tanggal_harus_kembali)->format('d/m/Y') : '-' }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $item->tanggal_pengembalian ? \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d/m/Y') : '-' }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center">Tidak ada data pengembalian.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

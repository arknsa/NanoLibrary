<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Book;
use App\Models\Pemesanan;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\ActiveUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Data statistik (tetap sama)
        $totalMahasiswa = Mahasiswa::count();
        $totalJenisBuku = Book::count();
        $totalKategoriBuku = Book::distinct('Kategori')->count('Kategori');
        $totalDipesan = Pemesanan::count();
        $totalDipinjamkan = Peminjaman::count();
        $totalDikembalikan = Pengembalian::count();
        $occupied = ActiveUser::whereNull('exit_time')->count();

        // Data untuk Line Chart
        $anggotaPerMonth = Mahasiswa::select(
                DB::raw('COUNT(*) as count'),
                DB::raw("DATE_FORMAT(created_at, '%M %Y') as month")
            )
            ->groupBy('month')
            ->orderBy('created_at', 'asc')
            ->get();

        $lineChartLabels = $anggotaPerMonth->pluck('month');
        $lineChartData = $anggotaPerMonth->pluck('count');

        // Data untuk Pie Chart: Distribusi Kategori Buku
        $kategoriBuku = Book::select('Kategori', DB::raw('COUNT(*) as count'))
            ->groupBy('Kategori')
            ->orderBy('count', 'desc')
            ->get();

        $kategoriPieChartLabels = $kategoriBuku->pluck('Kategori');
        $kategoriPieChartData = $kategoriBuku->pluck('count');

        // Data untuk Bar Chart: Stok Buku per ID Buku (menyertakan judul)
        $bookStocks = Book::select('id_buku', 'Judul', 'Stok')
            ->orderBy('Stok', 'desc')
            ->take(10) // Top 10 buku berdasarkan stok
            ->get();

        // Menyiapkan data untuk Bar Chart
        $stockBarChartLabels = $bookStocks->pluck('id_buku');
        $stockBarChartData = $bookStocks->pluck('Stok');
        $stockBarChartTitles = $bookStocks->pluck('Judul');

        // Mengirim data ke view
        return view('adm.index', compact(
            'totalMahasiswa',
            'totalJenisBuku',
            'totalKategoriBuku',
            'totalDipesan',
            'totalDipinjamkan',
            'totalDikembalikan',
            'occupied',
            'lineChartLabels',
            'lineChartData',
            'kategoriPieChartLabels',
            'kategoriPieChartData',
            'stockBarChartLabels',
            'stockBarChartData',
            'stockBarChartTitles'
        ));
    }
}

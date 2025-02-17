<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mahasiswa;
use App\Models\Book;
use App\Models\Pemesanan;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\ActiveUser;
use App\Models\FactKunjungan;
use App\Models\FactTransaksi;
use App\Models\FactDenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Data statistik umum
        $totalMahasiswa = Mahasiswa::count();
        $totalJenisBuku = Book::count();
        $totalKategoriBuku = Book::distinct('Kategori')->count('Kategori');
        $totalDipesan = Pemesanan::count();
        $totalDipinjamkan = Peminjaman::count();
        $totalDikembalikan = Pengembalian::count();
        $occupied = ActiveUser::whereNull('exit_time')->count();

        // Statistik kunjungan (FactKunjungan)
        $totalKunjungan = FactKunjungan::count();
        $avgDurasiKunjungan = FactKunjungan::avg('durasi');

        // Statistik transaksi (FactTransaksi)
        $totalTransaksi = FactTransaksi::count();
        $tepatWaktu = FactTransaksi::where('status', 'Tepat Waktu')->count();
        $terlambat = FactTransaksi::where('status', 'Terlambat')->count();

        // Data untuk Line Chart Anggota per Bulan (dari Mahasiswa)
        $anggotaPerMonth = Mahasiswa::select(
            DB::raw('COUNT(*) as count'),
            DB::raw("DATE_FORMAT(created_at, '%M %Y') as month")
        )
        ->groupBy('month')
        ->orderBy('created_at', 'asc')
        ->get();
        $lineChartLabels = $anggotaPerMonth->pluck('month');
        $lineChartData = $anggotaPerMonth->pluck('count');

        // Data untuk Pie Chart: Distribusi Kategori Buku (dari Book)
        $kategoriBuku = Book::select('Kategori', DB::raw('COUNT(*) as count'))
            ->groupBy('Kategori')
            ->orderBy('count', 'desc')
            ->get();
        $kategoriPieChartLabels = $kategoriBuku->pluck('Kategori');
        $kategoriPieChartData = $kategoriBuku->pluck('count');

        // Data untuk Bar Chart: Stok Buku per ID Buku (menyertakan Judul)
        $bookStocks = Book::select('id_buku', 'Judul', 'Stok')
            ->orderBy('Stok', 'desc')
            ->take(10) // Top 10 buku berdasarkan stok
            ->get();
        $stockBarChartLabels = $bookStocks->pluck('id_buku');
        $stockBarChartData = $bookStocks->pluck('Stok');
        $stockBarChartTitles = $bookStocks->pluck('Judul');

        // Fetch the necessary fields from DimWaktu
        $kunjunganFilter = $request->input('filter', 'day'); // Default to 'day'

        $kunjunganData = FactKunjungan::select(
            DB::raw('COUNT(*) as jumlah'),
            $kunjunganFilter === 'day' ? DB::raw('DATE(dim_waktu.tanggal) as group_field') : (
                $kunjunganFilter === 'month' ? DB::raw("DATE_FORMAT(dim_waktu.tanggal, '%Y-%m') as group_field") : (
                    $kunjunganFilter === 'quarter' ? DB::raw("CONCAT(dim_waktu.kuartal, ' ', DATE_FORMAT(dim_waktu.tanggal, '%Y')) as group_field") : DB::raw("DATE_FORMAT(dim_waktu.tanggal, '%Y') as group_field")
                )
            )
        )
        ->join('dim_waktu', 'fact_kunjungan.sk_waktu', '=', 'dim_waktu.sk_waktu')
        ->whereNotNull('dim_waktu.tanggal')
        ->groupBy('group_field')
        ->orderBy('group_field', 'asc')
        ->get();

        // Logging the fetched data
        Log::info('Kunjungan Data: ' . json_encode($kunjunganData->toArray()));
        Log::info('Group Fields: ' . json_encode($kunjunganData->pluck('group_field')->take(10)->toArray()));
        
        // Prepare labels based on the filter
        if ($kunjunganFilter === 'quarter') {
            $kunjunganLabels = $kunjunganData->pluck('group_field')->map(function ($groupField) {
                $groupField = trim($groupField); // Trim any extra spaces
                if (preg_match('/^Q(\d)\s+(\d{4})$/', $groupField, $matches)) { // Match Q1 to Q4
                    $quarter = intval($matches[1]);
                    if ($quarter >= 1 && $quarter <= 4) {
                        return "Q" . $quarter . " " . $matches[2];
                    } else {
                        return 'Invalid Quarter';
                    }
                } else {
                    return 'Unknown Quarter';
                }
            });
        } else if ($kunjunganFilter === 'month') {
            $kunjunganLabels = $kunjunganData->pluck('group_field')->map(function ($date) {
                return Carbon::parse($date)->format('M Y');
            });
        } else if ($kunjunganFilter === 'day') {
            $kunjunganLabels = $kunjunganData->pluck('group_field')->map(function ($date) {
                return Carbon::parse($date)->format('d M Y');
            });
        } else {
            $kunjunganLabels = $kunjunganData->pluck('group_field');
        }

        $kunjunganDataValues = $kunjunganData->pluck('jumlah');

        
        // Data untuk status transaksi (tepat waktu vs terlambat)
        $tepatWaktu = FactTransaksi::where('status', 'Tepat Waktu')->count();
        $terlambat = FactTransaksi::where('status', 'Terlambat')->count();
        $transaksiStatusLabels = ['Tepat Waktu', 'Terlambat'];
        $transaksiStatusData = [$tepatWaktu, $terlambat];

        // Data Terlambat (FactDenda): total denda per hari
        $terlambatPerDate = FactDenda::select(
            DB::raw('DATE(Tanggal_Pengembalian) as tgl'),
            DB::raw('SUM(denda) as total_denda')
        )
        ->groupBy('tgl')
        ->orderBy('tgl', 'asc')
        ->get();

        $terlambatLabels = $terlambatPerDate->pluck('tgl')->map(function($date) {
            return Carbon::parse($date)->format('d M Y');
        });
        $terlambatData = $terlambatPerDate->pluck('total_denda');

        
        // Statistik tambahan dari fact_denda
        $totalTerlambat = FactDenda::count();
        $totalDenda = FactDenda::sum('denda');


        
        return view('adm.index', compact(
            'totalMahasiswa',
            'totalJenisBuku',
            'totalKategoriBuku',
            'totalDipesan',
            'totalDipinjamkan',
            'totalDikembalikan',
            'occupied',
            'totalKunjungan',
            'avgDurasiKunjungan',
            'totalTransaksi',
            'tepatWaktu',
            'terlambat',
            'lineChartLabels',
            'lineChartData',
            'kategoriPieChartLabels',
            'kategoriPieChartData',
            'stockBarChartLabels',
            'stockBarChartData',
            'stockBarChartTitles',
            'kunjunganLabels', 
            'kunjunganDataValues', 
            'kunjunganFilter',
            'transaksiStatusLabels',
            'transaksiStatusData',
            'terlambatLabels',
            'terlambatData',
            'totalTerlambat',
            'totalDenda'
        ));
    }
}

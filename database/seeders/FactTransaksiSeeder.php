<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FactTransaksiSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        for ($i = 1; $i <= 20; $i++) { // Reduced from 50 to 20
            $tanggalPeminjaman = Carbon::now()->subDays(rand(15, 30));
            $tenggatPengembalian = $tanggalPeminjaman->copy()->addDays(7);
            $tanggalPengembalian = $tenggatPengembalian->copy()->addDays(rand(-2, 5));
            $durasi = $tanggalPeminjaman->diffInDays($tanggalPengembalian);
            $lama_keterlambatan = $tenggatPengembalian->diffInDays($tanggalPengembalian, false);

            if ($lama_keterlambatan < 0) {
                $status = 'Tepat Waktu';
                $lama_keterlambatan = 0;
            } else {
                $status = 'Terlambat';
            }

            $sk_buku = rand(1, 10); // Adjusted to match fewer books
            $sk_user = rand(1, 10); // Adjusted to match fewer users
            $sk_waktu = rand(1, 50); // Adjusted to match fewer time keys

            $data[] = [
                'sk_transaksi' => $i,
                'Tanggal_Peminjaman' => $tanggalPeminjaman,
                'Tenggat_Pengembalian' => $tenggatPengembalian,
                'Tanggal_Pengembalian' => $tanggalPengembalian,
                'durasi' => $durasi,
                'lama_keterlambatan' => $lama_keterlambatan,
                'status' => $status,
                'sk_buku' => $sk_buku,
                'sk_user' => $sk_user,
                'sk_waktu' => $sk_waktu,
            ];
        }

        DB::connection('mysql_dw')->table('fact_transaksi')->insert($data);
    }
}
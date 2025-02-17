<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FactDendaSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        for ($i = 1; $i <= 20; $i++) { // Reduced from 100 to 20
            $tanggalPeminjaman = Carbon::now()->subDays(rand(365, 730));
            $tenggatPengembalian = $tanggalPeminjaman->copy()->addDays(7);
            $delayHours = rand(1, 72);
            $tanggalPengembalian = $tenggatPengembalian->copy()->addHours($delayHours);

            $delayInDays = $tanggalPengembalian->diffInDays($tenggatPengembalian);
            if ($tanggalPengembalian->diff($tenggatPengembalian)->h > 0) {
                $delayInDays += 1;
            }
            $delayInDays = max(0, $delayInDays);
            $denda = $delayInDays * 10000;

            $sk_user = rand(1, 10); // Adjusted to match fewer users
            $sk_buku = rand(1, 10); // Adjusted to match fewer books
            $sk_waktu = rand(1, 50); // Adjusted to match fewer time keys

            $data[] = [
                'sk_user' => $sk_user,
                'sk_buku' => $sk_buku,
                'sk_waktu' => $sk_waktu,
                'Tanggal_Peminjaman' => $tanggalPeminjaman,
                'Tanggal_Pengembalian' => $tanggalPengembalian,
                'Tenggat_Pengembalian' => $tenggatPengembalian,
                'denda' => $denda,
            ];
        }

        DB::connection('mysql_dw')->table('fact_denda')->insert($data);
    }
}
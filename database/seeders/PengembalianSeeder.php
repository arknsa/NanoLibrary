<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Carbon\Carbon;

class PengembalianSeeder extends Seeder
{
    public function run()
    {
        $peminjaman = Peminjaman::doesntHave('pengembalian')->get();

        if ($peminjaman->isEmpty()) {
            Pengembalian::factory()->count(5)->create(); // Reduced from 10 to 5
            return;
        }

        $totalPengembalian = min(20, $peminjaman->count()); // Reduced from 80 to 20
        $jumlahTerlambat = intval(0.2 * $totalPengembalian);

        $peminjaman->take($totalPengembalian)->each(function ($peminjaman, $index) use ($jumlahTerlambat) {
            $isLate = $index < $jumlahTerlambat;

            Pengembalian::create([
                'User_ID_User' => $peminjaman->User_ID_User,
                'Buku_ID_Buku' => $peminjaman->Buku_ID_Buku,
                'Tanggal_Pengembalian' => $isLate
                    ? Carbon::parse($peminjaman->Tenggat_Pengembalian)->addDays(rand(1, 10))
                    : Carbon::parse($peminjaman->Tenggat_Pengembalian)->subDays(rand(1, 7)),
                'Tanggal_Peminjaman' => $peminjaman->Tanggal_Peminjaman,
                'Tenggat_Pengembalian' => $peminjaman->Tenggat_Pengembalian,
            ]);
        });
    }
}
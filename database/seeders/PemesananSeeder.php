<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pemesanan;
use App\Models\Peminjaman;
use Carbon\Carbon;

class PemesananSeeder extends Seeder
{
    public function run()
    {
        $totalPemesanan = 20; // Reduced from 100 to 20

        $pemesanan = Pemesanan::factory()->count($totalPemesanan)->create();

        $persentaseDiproses = 70;
        $jumlahDiproses = intval(($persentaseDiproses / 100) * $totalPemesanan);

        if ($jumlahDiproses > $pemesanan->count()) {
            $jumlahDiproses = $pemesanan->count();
        }

        $pemesananDiproses = $pemesanan->random($jumlahDiproses);

        foreach ($pemesananDiproses as $p) {
            Peminjaman::create([
                'User_ID_User' => $p->User_ID_User,
                'Buku_ID_Buku' => $p->Buku_ID_Buku,
                'Tanggal_Peminjaman' => Carbon::parse($p->Tanggal_Pemesanan)->addDay(),
                'Tenggat_Pengembalian' => Carbon::parse($p->Tanggal_Pemesanan)->addDays(8),
            ]);

            $p->delete();
        }

        Pemesanan::whereDate('Tanggal_Pemesanan', '<', Carbon::today()->addDay())->delete();
    }
}
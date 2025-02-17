<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;

class PeminjamanSeeder extends Seeder
{
    public function run()
    {
        $totalPeminjaman = 10; // Reduced from 50 to 10

        $persentaseTerlambat = 20;

        $jumlahTerlambat = intval(($persentaseTerlambat / 100) * $totalPeminjaman);

        Peminjaman::factory()->count($totalPeminjaman - $jumlahTerlambat)->create();

        Peminjaman::factory()->count($jumlahTerlambat)->terlambat()->create();
    }
}
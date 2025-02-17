<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Memanggil BookSeeder
        $this->call([
            BookSeeder::class,
            UserSeeder::class,
            PemesananSeeder::class,     // Seeder untuk Pemesanan
            PengembalianSeeder::class,  // Seeder untuk Pengembalian
            PeminjamanSeeder::class,
            UserHistorySeeder::class,
            // FactTransaksiSeeder::class,
            // FactDendaSeeder::class,
            // FactKunjunganSeeder::class,
            // DimBukuSeeder::class,
            // DimUserSeeder::class,
            // DimWaktuSeeder::class,
        ]);
    }
}

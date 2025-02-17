<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DimWaktuSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $startDate = Carbon::now()->subYears(2);
        $endDate = Carbon::now();

        while ($startDate <= $endDate) {
            $data[] = [
                'sk_waktu' => $startDate->format('Ymd'),
                'tanggal' => $startDate->toDateString(),
                'hari' => $startDate->format('l'),
                'bulan' => $startDate->format('F'),
                'kuartal' => 'Q' . ceil($startDate->month / 3),
                'tahun' => $startDate->year,
            ];

            $startDate->addDay();
        }

        DB::connection('mysql_dw')->table('dim_waktu')->insert($data);
    }
}

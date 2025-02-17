<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FactKunjunganSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        for ($i = 1; $i <= 100; $i++) { // Generate 1000 records
            $startDate = Carbon::now()->subYears(2);
            $randomDays = rand(0, 730); // 2 years in days
            $entry_time = $startDate->copy()->addDays($randomDays);
            $exit_time = $entry_time->copy()->addMinutes(rand(60, 600)); // Longer duration
            $durasi = $entry_time->diffInMinutes($exit_time);

            $sk_waktu = $this->getSkWaktu($entry_time);
            $sk_user = rand(1, 12); // Adjust based on the number of users in dim_user

            $data[] = [
                'sk_kunjungan' => $i,
                'sk_user' => $sk_user,
                'sk_waktu' => $sk_waktu,
                'entry_time' => $entry_time,
                'exit_time' => $exit_time,
                'durasi' => $durasi,
            ];
        }

        DB::connection('mysql_dw')->table('fact_kunjungan')->insert($data);
    }

    private function getSkWaktu(Carbon $date)
    {
        return DB::connection('mysql_dw')->table('dim_waktu')
            ->where('tanggal', $date->toDateString())
            ->value('sk_waktu');
    }
}
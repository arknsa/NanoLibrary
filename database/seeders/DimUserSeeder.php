<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DimUserSeeder extends Seeder
{
    public function run()
    {
        // Define program studies with codes
        $programStudies = [
            'Rekayasa Nanoteknologi' => '01',
            'Teknik Robotika dan Kecerdasan Buatan' => '02',
            'Teknologi Sains Data' => '03',
            'Teknik Industri' => '04',
            'Teknik Elektro' => '05',
        ];

        // Define angkatans
        $angkatans = [2021, 2022, 2023, 2024];

        // Initialize sk_user
        $skUser = 1;

        // Array to hold users data
        $usersData = [];

        // Generate users for each program study and angkatan
        foreach ($programStudies as $programStudi => $programCode) {
            foreach ($angkatans as $angkatan) {
                for ($i = 1; $i <= 1; $i++) {
                    // Generate NIM
                    $sequence = str_pad($i, 3, '0', STR_PAD_LEFT);
                    $NIM = $angkatan . $programCode . $sequence;

                    // Generate a sample name (can be randomized if needed)
                    $nama = "User {$skUser}";

                    // Collect data
                    $usersData[] = [
                        'sk_user' => $skUser,
                        'NIM' => $NIM,
                        'Nama' => $nama,
                        'Email' => "user{$skUser}@example.com",
                        'Angkatan' => $angkatan,
                        'Program_Studi' => $programStudi,
                    ];

                    // Increment sk_user
                    $skUser++;
                }
            }
        }

        // Add admin user
        $usersData[] = [
            'sk_user' => $skUser,
            'NIM' => null,
            'Nama' => 'Administrator',
            'Email' => 'admin@ftmm.unair.ac.id',
            'Angkatan' => null,
            'Program_Studi' => null,
        ];

        // Insert all users data into dim_user table
        DB::connection('mysql_dw')->table('dim_user')->insert($usersData);
    }
}
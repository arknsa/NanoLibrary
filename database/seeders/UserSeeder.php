<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $programStudies = [
            'Rekayasa Nanoteknologi',
            'Teknik Robotika dan Kecerdasan Buatan',
            'Teknologi Sains Data',
            'Teknik Industri',
            'Teknik Elektro',
        ];

        $angkatans = [2021, 2022, 2023, 2024];

        foreach ($programStudies as $programStudi) {
            foreach ($angkatans as $angkatan) {
                User::factory()
                    ->withProgramStudiAndAngkatan($programStudi, $angkatan)
                    ->count(2)
                    ->create();
            }
        }

        // Tambahkan akun admin
        User::create([
            'Role'          => 'admin',
            'Email'         => 'admin.nanolib@ftmm.unair.ac.id',
            'Password'      => Hash::make('nanolib123'),
            'NIM'           => null,
            'Nama'          => 'Administrator',
            'No_Telp'       => '081234567890',
            'Program_Studi' => null,
            'Angkatan'      => null,
        ]);
    }
}

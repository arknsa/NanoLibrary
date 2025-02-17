<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserHistory;

class UserHistorySeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk membuat 100 atau lebih entry history
        UserHistory::factory()->count(3)->create(); // Ganti angka 200 dengan jumlah yang diinginkan
    }
}

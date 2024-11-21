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
        ]);
    }
}

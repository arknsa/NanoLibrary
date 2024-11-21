<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        // Menghasilkan 50 data buku
        Book::factory()->count(50)->create();
    }
}

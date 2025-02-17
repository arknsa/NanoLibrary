<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DimBukuSeeder extends Seeder
{
    public function run()
    {
        DB::connection('mysql_dw')->table('dim_buku')->insert([
            [
                'sk_buku' => 1,
                'Judul' => 'Applied Multivariate Statistical Analysis 5th Edition',
                'Author' => 'Richard Arnold Johnson, Dean W. Wichern',
                'Penerbit' => 'Pearson College Div',
                'Bahasa' => 'Inggris',
                'Kategori' => 'Statistika',
                'Stok' => 15,
                'Akses' => 'Dapat dipinjam',
            ],
            [
                'sk_buku' => 2,
                'Judul' => 'Multivariate Data Analysis (8th Edition)',
                'Author' => 'Joseph F Hair, Barry J. Babin, Rolph E. Anderson, William C. Black',
                'Penerbit' => 'Cengage Learning',
                'Bahasa' => 'Inggris',
                'Kategori' => 'Statistika',
                'Stok' => 15,
                'Akses' => 'Dapat dipinjam',
            ],
            [
                'sk_buku' => 3,
                'Judul' => 'Concise Guide to Databases',
                'Author' => 'Konstantinos Domdouzis, Peter Lake, Paul Crowther',
                'Penerbit' => 'Springer',
                'Bahasa' => 'Inggris',
                'Kategori' => 'Pemrograman',
                'Stok' => 10,
                'Akses' => 'Dapat dipinjam',
            ],
        ]);
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = \App\Models\Book::class;

    public function definition()
    {
        return [
            'Judul' => $this->faker->sentence(3),
            'Sampul' => $this->faker->imageUrl(),
            'Author' => $this->faker->name(),
            'Deskripsi' => $this->faker->paragraph(),
            'Halaman' => $this->faker->numberBetween(100, 500),
            'Penerbit' => $this->faker->company(),
            'Tahun' => $this->faker->year(),
            'Berat' => $this->faker->numberBetween(100, 2000), // dalam gram
            'ISBN' => $this->faker->unique()->isbn13(),
            'Lebar' => $this->faker->randomFloat(2, 10, 30), // dalam cm
            'Panjang' => $this->faker->randomFloat(2, 10, 30), // dalam cm
            'Bahasa' => $this->faker->languageCode,
            'Kategori' => $this->faker->word(),
            'Stok' => $this->faker->numberBetween(0, 100),
            'Akses' => $this->faker->randomElement(['Dapat dipinjam', 'Baca di tempat']),
        ];
    }
}

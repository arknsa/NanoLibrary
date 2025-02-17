<?php

namespace Database\Factories;

use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Pemesanan>
 */
class PemesananFactory extends Factory
{
    protected $model = Pemesanan::class;

    public function definition()
    {
        // Pastikan ada data User dan Buku
        $userIds = User::pluck('ID_User')->toArray();
        $bookIds = Book::pluck('ID_Buku')->toArray();

        if (empty($userIds) || empty($bookIds)) {
            return [
                'ID_Pemesanan' => strtoupper(Str::random(8)),
                'User_ID_User' => null,
                'Buku_ID_Buku' => null,
                'Tanggal_Pemesanan' => null,
            ];
        }

        // Pilih User dan Buku secara acak
        $userId = $this->faker->randomElement($userIds);
        $bookId = $this->faker->randomElement($bookIds);

        // Tetapkan Tanggal Pemesanan ke hari ini
        $tanggalPemesanan = Carbon::today();

        return [
            'ID_Pemesanan' => strtoupper(Str::random(8)),
            'User_ID_User' => $userId,
            'Buku_ID_Buku' => $bookId,
            'Tanggal_Pemesanan' => $tanggalPemesanan->format('Y-m-d'),
        ];
    }
}

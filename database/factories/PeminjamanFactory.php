<?php

namespace Database\Factories;

use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    protected $model = Peminjaman::class;

    public function definition()
    {
        // Pastikan ada data User dan Buku
        $userIds = User::pluck('ID_User')->toArray();
        $bookIds = Book::pluck('ID_Buku')->toArray();

        if (empty($userIds) || empty($bookIds)) {
            return [
                'User_ID_User' => null,
                'Buku_ID_Buku' => null,
                'Tanggal_Peminjaman' => null,
                'Tenggat_Pengembalian' => null,
            ];
        }

        // Pilih User dan Buku secara acak
        $userId = $this->faker->randomElement($userIds);
        $bookId = $this->faker->randomElement($bookIds);

        // Tentukan Tanggal Peminjaman mulai dari hari ini ke depan
        $tanggalPeminjaman = $this->faker->dateTimeBetween('now', '+1 months');

        // Tenggat Pengembalian (misalnya, 7 hari setelah peminjaman)
        $tenggatPengembalian = Carbon::instance($tanggalPeminjaman)->addDays(7);

        return [
            'User_ID_User' => $userId,
            'Buku_ID_Buku' => $bookId,
            'Tanggal_Peminjaman' => $tanggalPeminjaman->format('Y-m-d'),
            'Tenggat_Pengembalian' => $tenggatPengembalian->format('Y-m-d'),
        ];
    }

    /**
     * State untuk membuat peminjaman terlambat
     */
    public function terlambat()
    {
        return $this->state(function (array $attributes) {
            // Tenggat pengembalian sudah lewat
            $newTenggatPengembalian = Carbon::now()->subDay(); // Tenggat sudah lewat

            return [
                'Tenggat_Pengembalian' => $newTenggatPengembalian->format('Y-m-d'),
            ];
        });
    }
}

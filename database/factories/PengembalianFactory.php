<?php

namespace Database\Factories;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Pengembalian>
 */
class PengembalianFactory extends Factory
{
    protected $model = Pengembalian::class;

    public function definition()
    {
        // Ambil peminjaman yang valid
        $peminjaman = Peminjaman::inRandomOrder()->first();

        if (!$peminjaman) {
            // Default data jika tidak ada peminjaman
            return [
                'User_ID_User' => null,
                'Buku_ID_Buku' => null,
                'Tanggal_Pengembalian' => now()->format('Y-m-d'),
                'Tanggal_Peminjaman' => now()->subDays(7)->format('Y-m-d'),
                'Tenggat_Pengembalian' => now()->format('Y-m-d'),
            ];
        }

        // Data berdasarkan peminjaman
        return [
            'User_ID_User' => $peminjaman->User_ID_User,
            'Buku_ID_Buku' => $peminjaman->Buku_ID_Buku,
            'Tanggal_Pengembalian' => now()->format('Y-m-d'),
            'Tanggal_Peminjaman' => $peminjaman->Tanggal_Peminjaman,
            'Tenggat_Pengembalian' => $peminjaman->Tenggat_Pengembalian,
        ];
    }


    /**
     * State untuk membuat pengembalian terlambat
     */
    public function terlambat()
    {
        return $this->state(function (array $attributes) {
            if (empty($attributes['Tenggat_Pengembalian'])) {
                return [
                    'Tanggal_Pengembalian' => null,
                ];
            }

            $tenggatPengembalian = Carbon::createFromFormat('Y-m-d', $attributes['Tenggat_Pengembalian']);
            $tanggalPengembalian = $tenggatPengembalian->copy()->addDays($this->faker->numberBetween(1, 10));

            return [
                'Tanggal_Pengembalian' => $tanggalPengembalian->format('Y-m-d'),
            ];
        });
    }
}

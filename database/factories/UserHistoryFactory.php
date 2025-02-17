<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserHistory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class UserHistoryFactory extends Factory
{
    protected $model = UserHistory::class;

    public function definition()
    {
        // Ambil user yang memiliki NIM yang tidak kosong
        $user = User::whereNotNull('NIM')->inRandomOrder()->first();

        // Jika tidak ada user dengan NIM valid, buat exception atau return array kosong
        if (!$user) {
            throw new \Exception("Tidak ada user dengan NIM valid.");
        }

        // Generate waktu masuk dan keluar
        $entryTime = $this->faker->dateTimeThisYear();
        $exitTime = Carbon::parse($entryTime)->addMinutes($this->faker->numberBetween(30, 180)); // Durasi antara 30 menit hingga 3 jam

        // Menambahkan entry_date dengan waktu 00.00.00
        $entryDate = Carbon::parse($entryTime)->startOfDay();

        return [
            'user_id' => $user->ID_User,
            'nama' => $user->Nama,
            'nim' => $user->NIM, // Menggunakan NIM dari user yang valid
            'program_studi' => $user->Program_Studi,
            'entry_time' => $entryTime,
            'exit_time' => $exitTime,
            'entry_date' => $entryDate, // Menambahkan entry_date dengan waktu 00.00.00
        ];
    }
}

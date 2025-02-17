<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [];
    }

    public function withProgramStudiAndAngkatan($programStudi, $angkatan)
    {
        // Reset unique generator
        $this->faker->unique(true);

        return $this->state(function (array $attributes) use ($programStudi, $angkatan) {
            $programCodes9 = [
                'Rekayasa Nanoteknologi' => '162',
                'Teknik Robotika dan Kecerdasan Buatan' => '163',
                'Teknologi Sains Data' => '164',
                'Teknik Industri' => '165',
                'Teknik Elektro' => '166',
            ];

            $programCodes12 = [
                'Teknologi Sains Data' => '1',
                'Teknik Robotika dan Kecerdasan Buatan' => '2',
                'Rekayasa Nanoteknologi' => '3',
                'Teknik Elektro' => '4',
                'Teknik Industri' => '5',
            ];

            // Tentukan panjang NIM (9 atau 12 digit)
            $nimLength = $this->faker->randomElement([9, 12]);

            if ($nimLength == 9) {
                $programCode = $programCodes9[$programStudi];
                $nim = $programCode . $this->faker->unique()->numerify(str_repeat('#', 6));
            } else {
                $digit7 = $programCodes12[$programStudi];
                $nim = $this->faker->unique()->numerify(str_repeat('#', 6) . $digit7 . str_repeat('#', 5));
            }

            // Generate nama
            $nama = $this->faker->name;

            // Generate email dengan angkatan di akhir
            // Tambahkan lebih banyak digit acak untuk email
            $emailName = strtolower(str_replace(' ', '.', $nama)) . '-' . $this->faker->unique()->numerify('####') . '-' . $angkatan;
            $email = $emailName . '@ftmm.unair.ac.id';

            // Generate No_Telp (9 hingga 13 digit angka)
            $noTelp = $this->faker->numerify(str_repeat('#', $this->faker->numberBetween(9, 13)));

            return [
                'Role'          => 'mahasiswa',
                'Email'         => $email,
                'Password'      => Hash::make('password'),
                'NIM'           => $nim,
                'Nama'          => $nama,
                'No_Telp'       => $noTelp,
                'Program_Studi' => $programStudi,
                'Angkatan'      => $angkatan,
            ];
        });
    }
}

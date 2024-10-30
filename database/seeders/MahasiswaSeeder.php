<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID'); // Menggunakan locale Indonesia untuk data yang lebih relevan

        for ($i = 0; $i < 1; $i++) {
            Mahasiswa::create([
                'nim' => $faker->unique()->numerify('#########'), // Menghasilkan NIM 9 digit unik
                'nama' => $faker->name,
                'prodi' => 'Teknik Informatika',
                'fakultas' => 'TEKNIK',
                'kelompok' => $faker->numberBetween(1, 14), // Menghasilkan kelompok antara 1 sampai 14
            ]);
        }
    }
}

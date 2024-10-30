<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Loop to create 33 admin accounts with group-based naming
        for ($i = 1; $i <= 33; $i++) {
            // Cek apakah user dengan email ini sudah ada
            if (!User::where('email', 'admin_kelompok' . $i . '@absen.com')->exists()) {
                User::create([
                    'name' => 'Admin Kelompok ' . $i,
                    'email' => 'admin_kelompok' . $i . '@absen.com',
                    'role' => 'admin',
                    'password' => bcrypt('adminkelompok' . $i),
                ]);
            }
        }

        // Call additional seeders (outside the loop)
        $this->call(UserSeeder::class);
    }
}

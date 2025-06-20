<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder untuk user biasa (user default Laravel)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test2@mail.com',
        ]);

        // ✅ Panggil seeder untuk dokter
        $this->call([
            DoctorSeeder::class,
        ]);
    }
}

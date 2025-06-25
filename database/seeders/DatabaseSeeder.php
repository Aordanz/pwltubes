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
      

        // ✅ Panggil seeder untuk dokter
        $this->call([
            
            AktivitasLansiaSeeder::class,
            AktivitasDewasaSeeder::class,
            AktivitasRemajaSeeder::class,
        ]);
    }
}

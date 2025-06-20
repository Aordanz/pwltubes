<?php

namespace Database\Seeders;

use App\Models\AktivitasDewasa;
use App\Models\AktivitasLansia;
use Illuminate\Database\Seeder;
use App\Models\User;
// use Database\Seeders\DoctorSeeder;
use Database\Seeders\AktivitasRemajaSeeder;
use Database\Seeders\AktivitasDewasaSeeder;
use Database\Seeders\AktivitasLansiaSeeder;
 // ✅ Tambahkan baris ini

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // Menjalankan seeder lainnya
        $this->call([
            // DoctorSeeder::class,
            AktivitasRemajaSeeder::class,
            AktivitasDewasaSeeder::class,
            AktivitasLansiaSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToArray;

class AktivitasDewasaSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/aktivitas_dewasa.xlsx'); // ⬅️ Pastikan file ini ada di storage/app

        $data = Excel::toArray(new class implements ToArray {
            public function array(array $array)
            {
                return $array;
            }
        }, $path)[0]; // Sheet pertama

        // Mulai dari baris ke-3 (indeks 2), baris 1 & 2 untuk header
        for ($i = 2; $i < count($data); $i++) {
            $row = $data[$i];

            DB::table('aktivitas_dewasa')->insert([
                'hari'         => intval($row[1]),         // kolom B
                'aktivitas_pagi'    => $row[2] ?? null,          // kolom C
                'aktivitas_sore'    => $row[3] ?? null,          // kolom D
                'deskripsi_1'  => $row[4] ?? null,          // kolom E
                'deskripsi_2'  => $row[5] ?? null,          // kolom F
                'video'        => $row[6] ?? null,          // kolom G
                'video2'        => $row[7] ?? null,          // kolom h

                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}

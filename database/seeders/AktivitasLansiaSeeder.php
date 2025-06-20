<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToArray;

class AktivitasLansiaSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/aktivitas_lansia.xlsx'); // ⬅️ Sesuaikan nama file Excel

        // Inline import class
        $data = Excel::toArray(new class implements ToArray {
            public function array(array $array)
            {
                return $array;
            }
        }, $path)[0]; // Ambil sheet pertama

        // Mulai dari baris ke-3 (indeks 2), karena baris 1 = judul, 2 = header
        for ($i = 2; $i < count($data); $i++) {
            $row = $data[$i];

            DB::table('aktivitas_lansia')->insert([
                'hari'         => intval($row[1]),
                'aktivitas_pagi'    => $row[2] ?? null,
                'aktivitas_sore'    => $row[3] ?? null,
                'deskripsi_1'  => $row[4] ?? null,
                'deskripsi_2'  => $row[5] ?? null,
                'video'        => $row[6] ?? null,
                'video2'        => $row[7] ?? null,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}

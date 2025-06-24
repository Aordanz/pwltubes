<?php

namespace Database\Seeders;

use App\Models\AktivitasDewasa;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AktivitasDewasaSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/aktivitas_dewasa.xlsx');

        if (!file_exists($path)) {
            $this->command->error("File not found: $path");
            return;
        }

        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true); // gunakan key huruf: A, B, C...

        $this->command->info('Total rows (with header): ' . count($rows));

        $inserted = 0;

        foreach (array_slice($rows, 1) as $row) {
            if (empty(trim($row['B'] ?? ''))) {
                continue; // skip jika aktivitas kosong
            }


            AktivitasDewasa::create([
                'hari' => $row['B'] ?? '',
                'aktivitas_pagi' => $row['C'] ?? '',
                'aktivitas_sore' => $row['D'] ?? '',
                'deskripsi_1' => $row['E'] ?? '',
                'deskripsi_2' => $row['F'] ?? '',
                'video' => $row['G'] ?? '',
                'video2' => $row['H'] ?? '',
                
            ]);

            $inserted++;
        }

        $this->command->info("Total inserted rows: $inserted");
    }
}

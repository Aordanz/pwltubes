<?php

namespace Database\Seeders;

use App\Models\AktivitasRemaja;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AktivitasSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/data_aktivitas.xlsx');

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

            AktivitasRemaja::create([
                'aktivitas' => $row['B'] ?? '',
                'video' => $row['C'] ?? '',
                'deskripsi' => $row['D'] ?? '',
                'program' => $row['E'] ?? '',
            ]);

            $inserted++;
        }

        $this->command->info("Total inserted rows: $inserted");
    }
}

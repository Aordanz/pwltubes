<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Seed the doctor's table.
     */
    public function run(): void
    {
        Doctor::create([
            'name' => 'Dr. Prawira Tarigan',
            'email' => 'dokter@example.com',
            'password' => Hash::make('password123'),
            'specialization' => 'Mentor Kesehatan', // opsional jika ada field ini
        ]);
    }
}

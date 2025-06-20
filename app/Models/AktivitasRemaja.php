<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasRemaja extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_remaja'; // Nama tabel sesuai dengan migration

    protected $fillable = [
        'hari',
        'program_1',
        'program_2',
        'deskripsi_1',
        'deskripsi_2',
        'video',
    ];
}

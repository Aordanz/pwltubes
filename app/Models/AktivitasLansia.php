<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// PASTIKAN NAMA KELAS SESUAI DENGAN NAMA FILE
class AktivitasLansia extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     *
     * @var string
     */
    protected $table = 'aktivitas_lansia';

    /**
     * Kolom-kolom yang boleh diisi.
     *
     * @var array
     */
    protected $fillable = [
        'hari',
        'aktivitas_pagi',
        'aktivitas_sore',
        'deskripsi_1',
        'deskripsi_2',
        'video',
        'video2',
    ];
}

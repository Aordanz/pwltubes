<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AktivitasDewasa extends Model
{
    protected $table = 'aktivitas_dewasa';

    protected $fillable = [
        'hari', 'program_1', 'program_2', 'deskripsi_1', 'deskripsi_2', 'video',
    ];
}

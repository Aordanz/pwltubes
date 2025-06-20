<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasRemaja extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_remaja';

    protected $fillable = [
        'aktivitas',
        'video',
        'deskripsi',
        'program',
    ];
}

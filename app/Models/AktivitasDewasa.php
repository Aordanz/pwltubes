<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasDewasa extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_dewasa';

    protected $fillable = [
        'hari',
        'aktivitas_pagi',
        'aktivitas_sore',
        'deskripsi_1',
        'deskripsi_2',        
        'video',
        'video_2',
    ];
}

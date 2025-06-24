<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- Import ini

class ActivityUser extends Model
{
    use HasFactory;

    // Properti $fillable Anda yang sudah ada
    protected $fillable = [
        'user_id',
        'hari',
        'kategori',
    ];

    /**
     * ==========================================================
     * TAMBAHKAN FUNGSI RELASI INI
     * ==========================================================
     * Mendefinisikan relasi "milik" ke model User.
     * Ini memberitahu Laravel bahwa setiap ActivityUser dimiliki oleh satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

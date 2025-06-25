<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 36e76976e6fb972c24be721100372691b78a9975
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
    ];

    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return true; // Ganti dengan pengecekan role jika perlu
    }
=======
        'age_category',
        'jenis_kelamin',
        'role',
        'photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
>>>>>>> 36e76976e6fb972c24be721100372691b78a9975
}

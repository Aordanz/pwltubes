<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityUser extends Model
{
    protected $table = 'activity_users';

    protected $fillable = [
        'user_id',
        'hari',
        'kategori',
    ];
}

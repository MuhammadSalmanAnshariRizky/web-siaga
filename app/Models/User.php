<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user'; // ← sesuaikan dengan nama tabel kamu

    protected $fillable = [
        'nama',
        'kelas',
        'peran', // ← ini tambahan
        'password',
        ];

    protected $hidden = [
        'password',
    ];
}

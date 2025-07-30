<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use app\Models\kelompok;

class User extends Authenticatable
{
    protected $table = 'users'; // ← sesuaikan dengan nama tabel kamu

    protected $primaryKey = 'id_user'; // default 'id', sesuaikan

    protected $fillable = [
        'nama',
        'kelas',
        'password',
        'peran',
    ];

    protected $hidden = [
        'password',
    ];
    public function kelompok()
    {
        return $this->hasOne(kelompok::class, 'id_user', 'id_user');
    }
}

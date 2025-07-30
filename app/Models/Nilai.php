<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    // Tambahkan ini:
    protected $primaryKey = 'id_nilai';
    protected $fillable = [
        'id_user',
        'kategori',
        'hasil_akhir',
        'durasi'
    ];

    public $timestamps = true;
}

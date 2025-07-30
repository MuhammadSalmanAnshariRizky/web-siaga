<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jawabanKelompok extends Model
{
    protected $table = 'jawaban_kelompok';
    // Tambahkan ini:
    protected $primaryKey = 'id_tabel_jawaban_kelompok';
    protected $fillable = [
        'nama_kelompok',
        'kelas',
        'kategori',
        'jawaban',
        'created_by'
    ];
    public $timestamps = true;
}

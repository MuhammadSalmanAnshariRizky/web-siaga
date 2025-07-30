<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\User;
class kelompok extends Model
{
    protected $table = 'kelompok';
    // Tambahkan ini:
    protected $primaryKey = 'id_kelompok';
    protected $fillable = [
        'nama_kelompok','id_user'
    ];
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user','id_user');
    }
}

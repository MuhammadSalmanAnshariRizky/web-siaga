<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id_user' => 1,
                'nama' => 'Ahmad Fadli',
                'peran' => 'siswa',
                'kelas' => 'IV-A',
                'jenis_kelamin' => 'laki-laki',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 2,
                'nama' => 'Siti Nurhaliza',
                'peran' => 'siswa',
                'kelas' => 'IV-A',
                'jenis_kelamin' => 'perempuan',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 3,
                'nama' => 'Budi Santoso',
                'peran' => 'siswa',
                'kelas' => 'IV-B',
                'jenis_kelamin' => 'laki-laki',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 4,
                'nama' => 'Rizky',
                'peran' => 'guru',
                'kelas' => null,
                'jenis_kelamin' => 'laki-laki',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

}

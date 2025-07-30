<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'password' => 'required|confirmed|min:4',
        ]);

        $exists = User::where('nama', $request->nama)
            ->where('kelas', $request->kelas)
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'nama' => 'Nama dan kelas sudah terdaftar.',
            ])->withInput();
        }



        User::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'peran' => 'siswa',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan masuk.');
    }

}

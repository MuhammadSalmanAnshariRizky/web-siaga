<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
 public function authenticate(Request $request)
    {
        $request->validate([
            'role' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($request->role === 'guru') {
            $request->validate([
                'nama_guru' => 'required|string',
            ]);

            $user = User::where('nama', $request->nama_guru)
                        ->where('peran', 'guru')
                        ->first();

        } else { // siswa
            $request->validate([
                'nama' => 'required|string',
                'kelas' => 'required|string',
            ]);

            $user = User::where('nama', $request->nama)
                        ->where('kelas', $request->kelas)
                        ->where('peran', 'siswa')
                        ->first();
        }

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            if ($user->peran === 'guru') {
                return redirect()->route('guru.dashboard');
            } else {
                return redirect('dashboard');
            }
        }

        return back()->with('error', 'Data login salah atau tidak ditemukan.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil logout.');
    }

}


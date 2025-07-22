<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $user = DB::table('user')->where('nama', $request->nama)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan session
            Session::put('user', $user);
            return redirect('/dashboard'); // arahkan ke dashboard
        }

        return back()->with('error', 'Nama atau password salah.');
    }
}


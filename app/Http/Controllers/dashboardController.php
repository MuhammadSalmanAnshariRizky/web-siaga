<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class dashboardController extends Controller
{
    public function index()
    {
        $nama = Auth::user()->nama; // ambil nama user yang sedang login
        return view('dashboard', compact('nama')); // kirim ke view
    }

}

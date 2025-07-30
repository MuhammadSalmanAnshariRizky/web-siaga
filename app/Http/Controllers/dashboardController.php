<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dashboardController extends Controller
{
    public function index()
    {
        $nama = Session::get('nama'); // ambil nama dari session
        return view('dashboard', compact('nama')); // kirim ke view
    }
}

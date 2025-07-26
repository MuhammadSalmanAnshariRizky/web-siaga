<?php

use App\Http\Controllers\latihanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/membaca', function () {
    return view('membaca');
});

Route::get('/bermain', function () {
    return view('bermain.game');
});

Route::get('/ayo-berlatih', [latihanController::class, 'index'])->name('ayo-berlatih');

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

Route::get('/membaca2', function () {
    return view('membaca2');
});

Route::get('/membaca3', function () {
    return view('membaca3');
});

Route::get('/membaca4', function () {
    return view('membaca4');
});

Route::get('/membaca5', function () {
    return view('membaca5');
});

Route::get('/membaca6', function () {
    return view('membaca6');
});

Route::get('/membaca7', function () {
    return view('membaca7');
});

Route::get('/membaca8', function () {
    return view('membaca8');
});

Route::get('/membaca9', function () {
    return view('membaca9');
});

Route::get('/membaca10', function () {
    return view('membaca10');
});

Route::get('/membaca11', function () {
    return view('membaca11');
});

Route::get('/membaca12', function () {
    return view('membaca12');
});

Route::get('/membaca13', function () {
    return view('membaca13');
});

Route::get('/membaca14', function () {
    return view('membaca14');
});

Route::get('/membaca15', function () {
    return view('membaca15');
});

Route::get('/membaca16', function () {
    return view('membaca16');
});

Route::get('/membaca17', function () {
    return view('membaca17');
});

Route::get('/membaca18', function () {
    return view('membaca18');
});

Route::get('/membaca19', function () {
    return view('membaca19');
});

Route::get('/membaca20', function () {
    return view('membaca20');
});

Route::get('/menonton', function () {
    return view('menonton');
});


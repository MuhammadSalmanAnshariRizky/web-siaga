<?php

use App\Exports\NilaiExport;
use App\Exports\SiswaExport;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\guruController;
use App\Http\Controllers\jawabanKelompokController;
use App\Http\Controllers\latihanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', [registerController::class, 'register'])->name('register');

Route::middleware(['auth', 'peran:siswa'])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    Route::get('/bermain', function () {
        return view('bermain.game');
    });
    Route::post('/nilai/simpan', [NilaiController::class, 'simpan'])->name('nilai.simpan');



    Route::get('/ayo-berlatih', [latihanController::class, 'index'])->name('ayo-berlatih');
    Route::post('/nilai/latihan', [NilaiController::class, 'simpanNilaiLatihan'])->name('nilai.latihan');

    Route::get('/membaca', function () {
        return view('membaca');
    });

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
    Route::get('/kolaborasi', function () {
        return view('ayoKolaborasi.kolaborasi');
    });

    Route::get('/ecobrick', [jawabanKelompokController::class, 'tampilanjawabanEcobrick'])->name('diskusiEcobrick');

    Route::get('/ecoenzim', [jawabanKelompokController::class, 'tampilanjawabanEcoenzim'])->name('diskusiEcoenzim');

    Route::get('/pupukbokashi', [jawabanKelompokController::class, 'tampilanjawabanPupukBokashi'])->name('diskusiPupukBokashi');

    Route::post('/simpan-jawaban-kelompok', [jawabanKelompokController::class, 'simpanJawaban'])->name('simpanJawabanKelompok');
    Route::get('/bekerja', function () {
        return view('ayoBekerja.bekerja');
    });
});

Route::middleware(['auth', 'peran:guru'])->group(function () {
    //route guru
    Route::get('/dashboardguru', [guruController::class, 'dashboard'])->name('guru.dashboard');
    Route::get('/siswa', [guruController::class, 'siswa'])->name('guru.siswa');
    Route::get('/guru/siswa/export', function () {
        $kelas = request('kelas');
        return Excel::download(new SiswaExport($kelas), 'data_siswa.xlsx');
    })->name('guru.siswa.export');

    Route::get('/nilai', [guruController::class, 'nilai'])->name('guru.nilai');
    Route::get('/guru/nilai/export', function () {
        $kategori = request('kategori');
        return Excel::download(new NilaiExport($kategori), 'data_nilai.xlsx');
    })->name('guru.nilai.export');
    Route::get('/guru/kelompok-terjawab', [guruController::class, 'kelompokTerjawab'])->name('guru.kelompok.terjawab');
    Route::get('/atur-kelompok', [guruController::class, 'aturKelompok'])->name('guru.aturKelompok');
    Route::post('/atur-kelompok/simpan', [guruController::class, 'simpanKelompok'])->name('guru.simpanKelompok');
    Route::post('/guru/nilai/simpan', [guruController::class, 'simpanNilaiKelompok'])->name('guru.simpanNilaiKelompok');

});



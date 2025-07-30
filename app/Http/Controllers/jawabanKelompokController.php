<?php

namespace App\Http\Controllers;

use App\Models\jawabanKelompok;
use App\Models\kelompok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jawabanKelompokController extends Controller
{

    public function tampilanjawabanEcobrick()
    {
        $user = Auth::user();

        // Cari kelompok berdasarkan id_user
        $kelompok = kelompok::where('id_user', $user->id_user)->first();

        if (!$kelompok) {
            return back()->with('error', 'Data kelompok tidak ditemukan.');
        }

        // Ambil jawaban yang sudah ada jika tersedia
        $jawabanLama = jawabanKelompok::where('kategori', 'ecobrick')
            ->where('nama_kelompok', $kelompok->nama_kelompok)
            ->where('kelas', $user->kelas)
            ->first();

        return view('ayoKolaborasi.ecobricks', compact('jawabanLama'));
    }
    public function tampilanjawabanEcoenzim()
    {
        $user = Auth::user();

        // Cari kelompok berdasarkan id_user
        $kelompok = kelompok::where('id_user', $user->id_user)->first();

        if (!$kelompok) {
            return back()->with('error', 'Data kelompok tidak ditemukan.');
        }

        // Ambil jawaban yang sudah ada jika tersedia
        $jawabanLama = jawabanKelompok::where('kategori', 'ecoenzim')
            ->where('nama_kelompok', $kelompok->nama_kelompok)
            ->where('kelas', $user->kelas)
            ->first();

        return view('ayoKolaborasi.ecoenzim', compact('jawabanLama'));
    }

    public function tampilanjawabanPupukBokashi()
    {
        $user = Auth::user();

        // Cari kelompok berdasarkan id_user
        $kelompok = kelompok::where('id_user', $user->id_user)->first();

        if (!$kelompok) {
            return back()->with('error', 'Data kelompok tidak ditemukan.');
        }

        // Ambil jawaban yang sudah ada jika tersedia
        $jawabanLama = jawabanKelompok::where('kategori', 'pupukbokashi')
            ->where('nama_kelompok', $kelompok->nama_kelompok)
            ->where('kelas', $user->kelas)
            ->first();

        return view('ayoKolaborasi.pupukbokashi', compact('jawabanLama'));
    }


    // Menyimpan jawaban ke database
    public function simpanJawaban(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:ecobrick,ecoenzim,pupukbokashi',
            'jawaban' => 'required|string',
        ]);

        $user = Auth::user();

        // Ambil data kelompok berdasarkan id_user
        $kelompok = kelompok::where('id_user', $user->id_user)->first();

        if (!$kelompok) {
            return back()->with('error', 'Data kelompok tidak ditemukan.');
        }

        // Cek apakah sudah ada jawaban dengan kategori dan nama_kelompok yang sama
        $existingJawaban = jawabanKelompok::where('kategori', $request->kategori)
            ->where('nama_kelompok', $kelompok->nama_kelompok)
            ->first();

        // Jika sudah ada, cek apakah kelas dan nama_kelompok cocok
        if ($existingJawaban) {
            if ($existingJawaban->kelas !== $user->kelas || $existingJawaban->nama_kelompok !== $kelompok->nama_kelompok) {
                return back()->with('error', 'Tidak diizinkan mengubah jawaban dari kelompok/kategori ini.');
            }

            // Update jawaban dan created_by
            $existingJawaban->update([
                'jawaban' => $request->jawaban,
                'created_by' => $user->nama,
            ]);

            return back()->with('success', 'Jawaban berhasil diperbarui!');
        }

        // Jika belum ada, buat data baru
        jawabanKelompok::create([
            'nama_kelompok' => $kelompok->nama_kelompok,
            'kelas' => $user->kelas,
            'kategori' => $request->kategori,
            'jawaban' => $request->jawaban,
            'created_by' => $user->nama,
        ]);

        return back()->with('success', 'Jawaban berhasil disimpan!');
    }

}

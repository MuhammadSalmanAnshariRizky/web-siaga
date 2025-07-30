<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function simpan(Request $request)
    {
        $request->validate([
            'hasil_akhir' => 'required|numeric',
            'durasi' => 'required|numeric',
            'kategori' => 'required|string'
        ]);

        $id_user = Auth::id(); // atau session('id_user') kalau pakai Session

        // Cek apakah sudah ada data nilai untuk user dan kategori tersebut
        $nilai = Nilai::where('id_user', $id_user)
            ->where('kategori', $request->kategori)
            ->first();

        if ($nilai) {
            // Update data lama
            $nilai->update([
                'hasil_akhir' => $request->hasil_akhir,
                'durasi' => $request->durasi,
                'updated_at' => now()
            ]);
        } else {
            // Buat data baru
            Nilai::create([
                'id_user' => $id_user,
                'kategori' => $request->kategori,
                'hasil_akhir' => $request->hasil_akhir,
                'durasi' => $request->durasi,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect('/dashboard')->with('nilai_tersimpan', 'Nilai berhasil disimpan!');
    }
    public function simpanNilaiLatihan(Request $request)
    {
        $request->validate([
            'hasil_akhir' => 'required|numeric',
            'durasi' => 'required|numeric',
            'kategori' => 'required|string'
        ]);

        $id_user = auth()->id() ?? session('id_user');
        if (!$id_user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        Nilai::updateOrCreate(
            ['id_user' => $id_user, 'kategori' => $request->kategori],
            [
                'hasil_akhir' => $request->hasil_akhir,
                'durasi' => $request->durasi,
            ]
        );

        return redirect('/dashboard')->with('nilai_latihan', 'Nilai berhasil disimpan!');
    }

}

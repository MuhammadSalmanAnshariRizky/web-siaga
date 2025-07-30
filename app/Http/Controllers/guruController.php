<?php

namespace App\Http\Controllers;

use App\Exports\NilaiExport;
use App\Models\kelompok;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class guruController extends Controller
{
    public function dashboard()
    {
        return view('guru.dashboardguru');
    }

    public function siswa(Request $request)
    {
        $kelasFilter = $request->input('kelas');

        $query = User::select('nama', 'kelas')
            ->where('peran', 'siswa'); // Tambahkan filter role

        if ($kelasFilter) {
            $query->where('kelas', $kelasFilter);
        }

        $siswa = $query->get();

        $semua_kelas = ['IV-A', 'IV-B', 'V-A', 'V-B', 'VI-A', 'VI-B'];

        return view('guru.siswa', compact('siswa', 'semua_kelas'));
    }

    public function nilai(Request $request)
    {
        $kategoriFilter = $request->input('kategori');
        $kelasFilter = $request->input('kelas');

        $query = DB::table('nilai')
            ->join('users', 'nilai.id_user', '=', 'users.id_user')
            ->select('users.nama', 'users.kelas', 'nilai.kategori', 'nilai.hasil_akhir');

        if ($kategoriFilter) {
            $query->where('nilai.kategori', $kategoriFilter);
        }

        if ($kelasFilter) {
            $query->where('users.kelas', $kelasFilter);
        }

        $data = $query->get();

        $semua_kelas = ['IV-A', 'IV-B', 'V-A', 'V-B', 'VI-A', 'VI-B']; // sesuaikan jika perlu

        return view('guru.nilai', compact('data', 'kategoriFilter', 'kelasFilter', 'semua_kelas'));
    }

    public function kelompokTerjawab(Request $request)
    {
        $query = DB::table('jawaban_kelompok')
            ->select('nama_kelompok', 'jawaban', 'kelas', 'kategori') // id_tabel_jawaban_kelompok dihapus
            ->whereNotNull('jawaban');

        if ($request->kelas) {
            $query->where('kelas', $request->kelas);
        }

        $data = $query->get();

        return view('guru.kelompokTerjawab', compact('data'));
    }


    public function aturKelompok(Request $request)
    {
        $kelasFilter = $request->input('kelas');
        $kelompokFilter = $request->input('kelompok'); // tambahkan ini

        $query = DB::table('users')
            ->leftJoin('kelompok', 'users.id_user', '=', 'kelompok.id_user')
            ->select(
                'users.nama as nama_siswa',
                'users.kelas',
                'kelompok.nama_kelompok',
                'users.id_user as id_user'
            )
            ->where('users.peran', 'siswa');

        if ($kelasFilter) {
            $query->where('users.kelas', $kelasFilter);
        }

        if ($kelompokFilter !== null) {
            if ($kelompokFilter === 'null') {
                // Tanpa kelompok
                $query->whereNull('kelompok.nama_kelompok');
            } else {
                // Filter berdasarkan nama kelompok
                $query->where('kelompok.nama_kelompok', $kelompokFilter);
            }
        }

        $siswa = $query->get();

        $semua_kelas = ['IV-A', 'IV-B', 'V-A', 'V-B', 'VI-A', 'VI-B'];

        return view('guru.aturKelompok', compact(
            'siswa',
            'semua_kelas',
            'kelasFilter',
            'kelompokFilter' // jangan lupa passing ini ke view untuk tab aktif
        ));
    }


    public function simpanKelompok(Request $request)
    {
        $request->validate([
            'nama_kelompok' => 'required|string',
            'id_user' => 'required|exists:users,id_user',
        ]);

        // Cek apakah user sudah punya data di tabel kelompok
        $kelompok = kelompok::where('id_user', $request->id_user)->first();

        if ($kelompok) {
            // Jika sudah ada, update nama_kelompok-nya saja
            $kelompok->update([
                'nama_kelompok' => $request->nama_kelompok,
            ]);

            return redirect()->back()->with('success', 'Nama kelompok diperbarui untuk siswa.');
        } else {
            // Jika belum ada, buat data baru
            kelompok::create([
                'nama_kelompok' => $request->nama_kelompok,
                'id_user' => $request->id_user,
            ]);

            return redirect()->back()->with('success', 'Siswa berhasil dimasukkan ke ' . $request->nama_kelompok);
        }
    }

    public function simpanNilaiKelompok(Request $request)
    {
        $request->validate([
            'nama_kelompok' => 'required|string',
            'jawaban' => 'required|string',
            'nilai' => 'required|numeric',
            'feedback' => 'required|string',
            'kategori' => 'required|string',
        ]);

        $nama_kelompok = $request->input('nama_kelompok');
        $hasil_akhir = $request->input('nilai');
        $feedback = $request->input('feedback');
        $kategori = $request->input('kategori');

        // Cari salah satu user untuk mengetahui kelas-nya
        $salah_satu = DB::table('kelompok')
            ->join('users', 'kelompok.id_user', '=', 'users.id_user')
            ->where('kelompok.nama_kelompok', $nama_kelompok)
            ->select('users.kelas')
            ->first();

        if (!$salah_satu) {
            return redirect()->back()->with('error', 'Kelompok tidak ditemukan.');
        }

        $kelas = $salah_satu->kelas;

        // Ambil semua user dalam kelompok DAN di kelas yang sama
        $users = DB::table('kelompok')
            ->join('users', 'kelompok.id_user', '=', 'users.id_user')
            ->where('kelompok.nama_kelompok', $nama_kelompok)
            ->where('users.kelas', $kelas)
            ->select('users.id_user')
            ->get();

        foreach ($users as $user) {
            DB::table('nilai')->updateOrInsert(
                ['id_user' => $user->id_user, 'kategori' => $kategori],
                [
                    'hasil_akhir' => $hasil_akhir,
                    'feedback' => $feedback,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }

        return redirect()->back()->with('success', 'Nilai berhasil disimpan untuk semua anggota kelompok di kelas yang sesuai.');
    }


}

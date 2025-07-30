<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NilaiExport implements FromView
{
    protected $kategori;

    public function __construct($kategori = null)
    {
        $this->kategori = $kategori;
    }

    public function view(): View
    {
        $query = DB::table('nilai')
            ->join('users', 'nilai.id_user', '=', 'users.id_user')
            ->select('users.nama', 'users.kelas', 'nilai.kategori', 'nilai.hasil_akhir');

        if ($this->kategori) {
            $query->where('nilai.kategori', $this->kategori);
        }

        $data = $query->get();

        return view('exports.nilai', [
            'data' => $data
        ]);
    }
}

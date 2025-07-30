<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class SiswaExport implements FromView
{
    protected $kelas;

    public function __construct($kelas = null)
    {
        $this->kelas = $kelas;
    }

    public function view(): View
    {
        $query = User::select('nama', 'kelas');

        if ($this->kelas) {
            $query->where('kelas', $this->kelas);
        }

        return view('exports.siswa', [
            'siswa' => $query->get()
        ]);
    }
}
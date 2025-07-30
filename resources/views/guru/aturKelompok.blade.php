@extends('layouts.app')

@section('title', 'Atur Kelompok Siswa')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Atur Kelompok Siswa</h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link {{ request('kelompok') == null ? 'active' : '' }}"
                        href="{{ route('guru.aturKelompok', ['kelas' => request('kelas')]) }}">Semua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request('kelompok') === 'null' ? 'active' : '' }}"
                        href="{{ route('guru.aturKelompok', ['kelas' => request('kelas'), 'kelompok' => 'null']) }}">Tanpa
                        Kelompok</a>
                </li>
                @for ($i = 1; $i <= 10; $i++)
                    <li class="nav-item">
                        <a class="nav-link {{ request('kelompok') == 'Kelompok ' . $i ? 'active' : '' }}"
                            href="{{ route('guru.aturKelompok', ['kelas' => request('kelas'), 'kelompok' => 'Kelompok ' . $i]) }}">
                            Kelompok {{ $i }}
                        </a>
                    </li>
                @endfor
            </ul>
            <!-- Filter Kelas -->
            <form method="GET" action="{{ route('guru.aturKelompok') }}" class="mb-3">
                <input type="hidden" name="kelompok" value="{{ request('kelompok') }}"> {{-- Tambahkan ini --}}
                <div class="row g-2 align-items-center">
                    <div class="col-auto">
                        <label for="kelas" class="col-form-label">Filter Kelas:</label>
                    </div>
                    <div class="col-auto">
                        <select name="kelas" id="kelas" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua Kelas</option>
                            @foreach ($semua_kelas as $kelas)
                                <option value="{{ $kelas }}" {{ $kelas == $kelasFilter ? 'selected' : '' }}>
                                    {{ $kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <!-- Tabel Siswa -->
            <div class="table-responsive">
                <table id="tabel-siswa" class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Nama Kelompok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn btn-warning btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $item->nama_kelompok ?? 'Belum ada kelompok' }}
                                        </button>
                                        <ul class="dropdown-menu p-3" style="min-width: 250px;">
                                            <li>
                                                <form method="POST" action="{{ route('guru.simpanKelompok') }}">
                                                    @csrf
                                                    <input type="hidden" name="id_user" value="{{ $item->id_user }}">

                                                    <div class="mb-2">
                                                        <label for="nama_kelompok_{{ $item->id_user }}"
                                                            class="form-label mb-1">Pilih Kelompok</label>
                                                        <select name="nama_kelompok" id="nama_kelompok_{{ $item->id_user }}"
                                                            class="form-select form-select-sm" required>
                                                            <option value="">-- Pilih --</option>
                                                            @for ($i = 1; $i <= 10; $i++)
                                                                <option value="Kelompok {{ $i }}" {{ $item->nama_kelompok == 'Kelompok ' . $i ? 'selected' : '' }}>
                                                                    Kelompok {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary btn-sm w-100">
                                                        {{ $item->nama_kelompok ? 'Update' : 'Simpan' }}
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data siswa</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tabel-siswa').DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    paginate: {
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    },
                    zeroRecords: "Data tidak ditemukan"
                }
            });
        });
    </script>
@endpush
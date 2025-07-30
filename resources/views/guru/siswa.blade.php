@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Siswa</h3>

            <!-- Filter Kelas -->
            <form method="GET" class="form-inline">
                <label for="kelas" class="mr-2">Filter Kelas:</label>
                <select name="kelas" id="kelas" class="form-control mr-2">
                    <option value="">Semua</option>
                    @foreach($semua_kelas as $kelas)
                        <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Tampilkan</button>
            </form>
            <a href="{{ route('guru.siswa.export', ['kelas' => request('kelas')]) }}" class="btn btn-success btn-sm ml-2">
                <i class="fas fa-file-excel"></i> Export Excel
            </a>

        </div>

        <div class="card-body">
            <table id="siswaTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswa as $s)
                        <tr>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->kelas }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- DataTables CSS & JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#siswaTable').DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    }
                }
            });
        });
    </script>
@endsection
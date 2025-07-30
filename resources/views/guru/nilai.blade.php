@extends('layouts.app')

@section('title', 'Nilai Siswa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Nilai Siswa</h3>
        </div>
        <div class="card-body">
            <!-- Filter kategori -->
            <!-- Filter kategori dan kelas -->
            <form method="GET" class="mb-3">
                <div class="form-inline">
                    <label for="kategori" class="mr-2">Filter Kategori:</label>
                    <select name="kategori" id="kategori" class="form-control mr-2">
                        <option value="">Semua</option>
                        <option value="bermain" {{ request('kategori') == 'bermain' ? 'selected' : '' }}>Bermain</option>
                        <option value="berlatih" {{ request('kategori') == 'berlatih' ? 'selected' : '' }}>Berlatih</option>
                        <option value="ecobrick" {{ request('kategori') == 'ecobrick' ? 'selected' : '' }}>Ecobrick</option>
                        <option value="ecoenzim" {{ request('kategori') == 'ecoenzim' ? 'selected' : '' }}>Ecoenzim</option>
                        <option value="pupukbokashi" {{ request('kategori') == 'pupukbokashi' ? 'selected' : '' }}>Pupuk
                            Bokashi</option>
                    </select>

                    <label for="kelas" class="mr-2 ml-3">Filter Kelas:</label>
                    <select name="kelas" id="kelas" class="form-control mr-2">
                        <option value="">Semua</option>
                        @foreach ($semua_kelas as $kelas)
                            <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
            </form>

            <a href="{{ route('guru.nilai.export', ['kategori' => request('kategori')]) }}" class="btn btn-success mb-3">
                Export Excel
            </a>


            <table id="nilaiTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Kategori</th>
                        <th>Hasil Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->kelas }}</td>
                            <td>{{ ucfirst($d->kategori) }}</td>
                            <td>{{ $d->hasil_akhir }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#nilaiTable').DataTable({
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
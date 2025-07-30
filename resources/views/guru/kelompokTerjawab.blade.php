@extends('layouts.app')

@section('title', 'Kelompok yang Sudah Menjawab')

@section('content')
    @php
        $semua_kelas = ['IV-A', 'IV-B', 'V-A', 'V-B', 'VI-A', 'VI-B'];
    @endphp

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Kelompok yang Sudah Menjawab</h3>
        </div>
        <div class="card-body">

            <!-- Filter Kelas -->
            <form method="GET" class="mb-3">
                <label for="kelas">Filter Kelas:</label>
                <select name="kelas" id="kelas" class="form-control w-auto d-inline mx-2">
                    <option value="">Semua</option>
                    @foreach($semua_kelas as $kelas)
                        <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>

            <!-- Tabel Kelompok -->
            <table id="jawabanTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Kelompok</th>
                        <th>Kelas</th>
                        <th>Jawaban</th>
                        <th>Kategori</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{ $d->nama_kelompok }}</td>
                            <td>{{ $d->kelas }}</td>
                            <td>{{ $d->kategori }}</td>
                            <td>{{ Str::limit($d->jawaban, 100) }}</td>
                            <td>
                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modalNilai{{ md5($d->nama_kelompok . $d->jawaban) }}">
                                    Beri Nilai
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Nilai -->
                        <div class="modal fade" id="modalNilai{{ md5($d->nama_kelompok . $d->jawaban) }}" tabindex="-1"
                            role="dialog" aria-labelledby="modalLabel{{ md5($d->nama_kelompok . $d->jawaban) }}"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="POST" action="{{ route('guru.simpanNilaiKelompok') }}">
                                    @csrf
                                    <input type="hidden" name="nama_kelompok" value="{{ $d->nama_kelompok }}">
                                    <input type="hidden" name="kelas" value="{{ $d->kelas }}">
                                    <input type="hidden" name="jawaban" value="{{ $d->jawaban }}">
                                    <input type="hidden" name="kategori" value="{{ $d->kategori }}">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Beri Nilai - {{ $d->nama_kelompok }}</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nilai">Nilai:</label>
                                                <input type="number" name="nilai" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="feedback">Feedback:</label>
                                                <textarea class="form-control" name="feedback" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#jawabanTable').DataTable({
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
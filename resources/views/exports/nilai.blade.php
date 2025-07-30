<table>
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

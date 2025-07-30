<table>
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

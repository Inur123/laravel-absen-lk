<!DOCTYPE html>
<html>

<head>
    <title>Mahasiswa PDF</title>
    <style>
        /* Add your styles here */
    </style>
</head>

<body>
    <h1>Data Mahasiswa</h1>
    @if (isset($mahasiswa))
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Kelompok</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($mahasiswa->id))
                    <tr>
                        <td>{{ $mahasiswa->id }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->prodi }}</td>
                        <td>{{ $mahasiswa->kelompok }}</td>
                    </tr>
                @else
                    @foreach ($mahasiswa as $mhs)
                        <tr>
                            <td>{{ $mhs->id }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama }}</td>
                            <td>{{ $mhs->prodi }}</td>
                            <td>{{ $mhs->kelompok }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    @endif
</body>

</html>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

    <h1>Data Mahasiswa</h1>

    <a href="/mahasiswa/create">
        Tambah Mahasiswa
    </a>

    <table border="1" cellpadding="10">

        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        @foreach($mahasiswas as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->nim }}</td>

            <td>{{ $item->nama }}</td>

            <td>
                {{ $item->prodi->nama_prodi }}
            </td>

            <td>{{ $item->alamat }}</td>

            <td>

                <a href="/mahasiswa/{{ $item->id }}/edit">
                    Edit
                </a>

                <form action="/mahasiswa/{{ $item->id }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

</body>
</html>
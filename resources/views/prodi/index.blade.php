<!DOCTYPE html>
<html>
<head>
    <title>Data Prodi</title>
</head>
<body>
    <h1>Data Prodi</h1>
    <a href="/prodi/create">
        Tambah Prodi
    </a>
    <table border="1" cellpadding="10">

        <tr>
            <th>No</th>
            <th>Nama Jurusan</th>
            <th>Nama Prodi</th>
            <th>Aksi</th>
        </tr>

        @foreach($prodis as $item)

        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>
                {{ $item->jurusan->nama_jurusan }}
            </td>

            <td>
                {{ $item->nama_prodi }}
            </td>
            <td>
                <a href="/prodi/{{ $item->id }}/edit">
                    Edit
                </a>
                <form action="/prodi/{{ $item->id }}"
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
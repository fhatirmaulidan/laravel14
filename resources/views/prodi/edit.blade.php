<!DOCTYPE html>
<html>
<head>
    <title>Edit Prodi</title>
</head>
<body>
    <h1>Edit Prodi</h1>
    <form action="/prodi/{{ $prodi->id }}"
          method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Jurusan</label>

            <select name="jurusan_id">

                @foreach($jurusans as $jurusan)

                <option value="{{ $jurusan->id }}"
                    {{ $prodi->jurusan_id == $jurusan->id ? 'selected' : '' }}>
                    {{ $jurusan->nama_jurusan }}
                </option>

                @endforeach

            </select>

        </div>

        <br>

        <div>

            <label>Nama Prodi</label>

            <input type="text"
                   name="nama_prodi"
                   value="{{ $prodi->nama_prodi }}">

        </div>
        <br>

        <button type="submit">
            Update
        </button>

    </form>

</body>
</html>
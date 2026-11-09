
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengguna</title>
    <style>
        
    </style>
</head>
<body>
    <h1>Tambah Pengguna</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('pengguna.store') }}" method="POST">
        @csrf

        <p>
            <label>Nama Pengguna</label><br>
            <input type="text" name="nama_pengguna"
                   value="{{ old('nama_pengguna') }}" required>
        </p>

        <p>
            <label>Email</label><br>
            <input type="email" name="email"
                   value="{{ old('email') }}" required>
        </p>

        <p>
            <label>Password (minimal 8 karakter)</label><br>
            <input type="password" name="password" required>
        </p>

        <button type="submit">Simpan</button>
        <a href="{{ route('pengguna.index') }}">Kembali</a>
    </form>
</body>
</html>

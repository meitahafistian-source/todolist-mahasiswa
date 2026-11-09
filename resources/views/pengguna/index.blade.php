
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pengguna</title>
</head>
<body>
    <h1>Data Pengguna</h1>

    <p><a href="{{ route('pengguna.create') }}">+ Tambah Pengguna</a></p>
    <p><a href="{{ route('mata_kuliah.index') }}">Data Mata Kuliah</a></p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengguna as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_pengguna }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ route('pengguna.edit', $item->id) }}">Edit</a>

                        <form action="{{ route('pengguna.destroy', $item->id) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Hapus pengguna ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data pengguna.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

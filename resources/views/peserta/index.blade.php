<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peserta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Peserta</h1>
        <a href="{{ route('peserta.create') }}" class="btn btn-primary mb-3">Tambah Peserta</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesertas as $peserta)
                <tr>
                    <td>{{ $peserta->id }}</td>
                    <td>{{ $peserta->nama }}</td>
                    <td>{{ $peserta->email }}</td>
                    <td>{{ $peserta->telepon }}</td>
                    <td>{{ $peserta->alamat }}</td>
                    <td>
                        <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('peserta.show', $peserta->id) }}" class="btn btn-info">View</a>
                        <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
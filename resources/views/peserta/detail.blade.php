<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail Peserta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #80deea);
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            font-weight: bold;
            color: #007bff; /* Warna biru yang lebih cerah */
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .card-header {
            background-color: #6c757d; /* Warna abu-abu lembut */
            color: white;
            padding: 20px;
            border-radius: 15px 15px 0 0;
            font-size: 1.5rem;
            text-align: center;
        }

        .table th {
            text-align: center;
        }

        .table td {
            padding: 15px;
            text-align: center;
        }

        .btn-custom {
            background-color: #28a745; /* Warna hijau cerah */
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 30px;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
        }

        .btn-custom:hover {
            background-color: #218838; /* Warna hijau gelap */
            box-shadow: 0 6px 12px rgba(34, 139, 34, 0.5);
        }

        .btn-secondary {
            border-radius: 30px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
            background-color: #e9ecef;
            border: 1px solid #007bff; /* Warna biru untuk border */
        }

        .text-end a {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="header">
            <h2>Detail Peserta</h2>
        </div>
        <div class="card">
            <div class="card-header">
                {{ $peserta->nama }}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $peserta->id }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $peserta->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $peserta->nama }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $peserta->email }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>{{ $peserta->telepon }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $peserta->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Token</th>
                            <td>{{ $peserta->token }}</td>
                        </tr>
                    </table>
                </div>
                <div class="mt-4">
                    <label class="form-label">Catatan :</label>
                    <p class="form-control" style="height: auto;">{{ $peserta->catatan }}</p>
                </div>
                <div class="text-end mb-3">
                    <a href="{{ route('peserta.qrcode', $peserta->id) }}" class="btn btn-custom">Generate QR Code</a>
                    @if (Auth::check())
                    <a href="{{ route('peserta.index') }}" class="btn btn-secondary" style="border-radius: 15px;">Kembali</a>
                    @else 
                    <a href="{{ route('login') }}" class="btn btn-secondary" style="border-radius: 15px;">Kembali</a>
                @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

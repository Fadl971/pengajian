<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tambah Peserta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.6);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            margin-top: 30px;
            text-align: center;
        }

        .header h2 {
            font-weight: bold;
            color: #007bff;
        }

        .form-container {
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .btn-custom {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 30px;
            transition: all 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .form-control {
            border-radius: 30px;
            padding: 10px 15px;
            border: 1px solid #007bff;
        }

        .form-label {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Tambah Peserta</h2>
    </div>

    <div class="form-container">
        <form action="{{ route('peserta.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Peserta</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama peserta" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="telepon" class="form-control" id="telepon" name="telepon" placeholder="Masukkan telepon peserta" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email peserta" required>
            </div>
            <div class="mb-3">
                <label for="registration_date" class="form-label">Alamat</label>
                <input type="alamat" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat peserta" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-custom">Simpan</button>
                <a href="{{ route('login') }}" class="btn btn-secondary" style="border-radius: 30px;">Kembali</a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
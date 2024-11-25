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
            background: linear-gradient(135deg, #e0f7fa, #80deea);
            font-family: 'Poppins', sans-serif;
        }

        .header {
            margin-top: 50px;
            text-align: center;
            padding-bottom: 20px;
        }

        .header h2 {
            font-weight: bold;
            color: #333;
        }

        .form-container {
            background-color: #fff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-container label {
            font-weight: bold;
            color: #495057;
        }

        .form-container .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
        }

        .form-container .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        .btn-custom {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 12px 20px;
            border-radius: 50px;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            border-radius: 50px;
            padding: 12px 20px;
            width: 100%;
            margin-top: 10px;
        }

        .radio-group {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
        }

        .radio-group label {
            display: block;
            padding: 10px;
            background-color: #f1f1f1;
            border-radius: 10px;
            width: 48%;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .radio-group input[type="radio"] {
            display: none;
        }

        .radio-group input[type="radio"]:checked + label {
            background-color: #007bff;
            color: #fff;
        }

        .container {
            max-width: 700px;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Tambah Peserta</h2>
        <p class="text-muted">-- Silahkan isi form di bawah untuk menambah peserta baru --</p>
    </div>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="form-container">
        <form id="formPeserta" action="{{ route('peserta.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <label class="form-control">
                    <input type="radio" name="jenis_kelamin" value="Ihkwan" {{ old('jenis_kelamin') == 'Ihkwan' ? 'checked' : '' }}>
                    Ihkwan
                    <input type="radio" name="jenis_kelamin" value="Ahkwat" {{ old('jenis_kelamin') == 'Ahkwat' ? 'checked' : '' }}>
                    Ahkwat
                </label>
            </div>

            <div class="mb-4">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
            </div>

            <div class="mb-4">
                <label for="telepon" class="form-label">Nomor Telepon</label>
                <input type="text" name="telepon" class="form-control" id="telepon" value="{{ old('telepon') }}" placeholder="Masukkan nomor telepon" required>
            </div>

            <div class="mb-4">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Masukkan alamat" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="text-center">
                <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#confirmModal">Simpan</button>
                @if (Auth::check())
                    <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Kembali</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary">Kembali</a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-3" style="font-size: 1.2rem; font-weight: 500;">Apakah Anda yakin data yang diisi sudah benar?</p>
                <small class="text-muted">Pastikan semua informasi sudah sesuai sebelum menyimpan.</small>
            </div>
            <div class="modal-footer d-flex justify-content-center gap-2">
                <button type="button" class="btn btn-light border" data-bs-dismiss="modal" style="border-radius: 30px; padding: 10px 20px;">Batal</button>
                <button type="button" class="btn btn-primary" id="submitForm" style="border-radius: 30px; padding: 10px 20px;">Ya, Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Handle form submission on confirmation
    document.getElementById('submitForm').addEventListener('click', function () {
        document.getElementById('formPeserta').submit();
    });
</script>
</body>
</html>

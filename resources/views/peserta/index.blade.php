<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Peserta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <style>
        body {
            background-color: rgba(0, 0, 0, 0.6);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            margin-top: 30px;
            margin-bottom: 20px;
            text-align: center;
        }

        .header h2 {
            font-weight: bold;
            color: #007bff;
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

        .table-responsive {
            margin-top: 30px;
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table.dataTable tbody tr:hover {
            background-color: #f1f1f1;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 30px;
            padding: 5px 15px;
            border: 1px solid #007bff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #007bff;
            color: white !important;
            border-radius: 5px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
            color: white !important;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Daftar Peserta</h2>
    </div>

    <div class="text-end mb-3">
        <a href="{{ route('peserta.create') }}" class="btn btn-custom">Tambah Peserta</a>
    </div>

    <div class="table-responsive">
        <table id="participantsTable" class="table table-striped table-hover">
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
        </table>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#participantsTable').DataTable({
            "language": {
                "lengthMenu": "Tampilkan MENU peserta per halaman",
                "zeroRecords": "Tidak ada data ditemukan",
                "info": "Menampilkan halaman PAGE dari PAGES",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(difilter dari total MAX peserta)",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
</body>
</html>
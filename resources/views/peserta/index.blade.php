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
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            font-family: 'Poppins', sans-serif;
        }

        .header {
            margin-top: 30px;
            margin-bottom: 20px;
            text-align: center;
        }

        .header h2 {
            font-weight: bold;
            color: #ffffff;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
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
            border: none;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
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
            
            color: white !important;
            border-radius: 5px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
            color: white !important;
        }

        .text-end a {
            text-decoration: none;
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 15px;
            background-color: rgba(255, 255, 255, 0.95);
        }

        .modal-header {
            background-color: #007bff;
            color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .modal-footer button {
            border-radius: 30px;
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
        <h2>Data Daftar Peserta Pengajian</h2>
    </div>

    <div class="text-end mb-3">
        <a href="{{ route('peserta.create') }}" class="btn btn-custom">Tambah Peserta</a>
        <a href="{{ route('logout') }}" class="btn btn-custom">Logout</a>
    </div>

    <div class="table-responsive">
        <table id="participantsTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jenis Kelamin</th>
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
                    <td> {{ $peserta->jenis_kelamin }}</td>
                    <td>{{ $peserta->nama }}</td>
                    <td>{{ $peserta->email }}</td>
                    <td>{{ $peserta->telepon }}</td>
                    <td>{{ $peserta->alamat }}</td>
                    <td>
                        <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('peserta.show', $peserta->id) }}" class="btn btn-info">View</a>
                        <!-- Tombol untuk memicu modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $peserta->id }}">
                                Delete
                            </button>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal{{ $peserta->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus peserta <strong>{{ $peserta->nama }}</strong>? Tindakan ini tidak dapat dibatalkan.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            "pageLength": 5, // Jumlah peserta per halaman, bisa disesuaikan
            "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]], // Opsi tampilan per halaman
            "language": {
                "lengthMenu": "Tampilkan _MENU_ peserta per halaman",
                "zeroRecords": "Tidak ada data ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(difilter dari total _MAX_ peserta)",
                "search": "Cari :",
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Views Peserta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #80deea);
            font-family: 'Poppins', sans-serif;
        }

        .header {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
        }

        .card-header {
            border-radius: 20px 20px 0 0;
            padding: 20px;
        }

        .card-body {
            padding: 40px;
            background-color: #ffffff;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
        }

        .qr-box {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e9ecef;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            padding: 30px;
            height: 250px; /* Tinggi untuk memberikan ruang pada QR Code */
            transition: transform 0.3s;
        }

        .qr-box:hover {
            transform: scale(1.05);
        }

        .btn-custom {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            transition: background-color 0.3s, transform 0.3s;
            margin-top: 10px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-secondary {
            border-radius: 30px;
            padding: 12px 30px;
            margin-top: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-secondary:hover {
            background-color: #6c757d;
            transform: scale(1.05);
        }

        .text-center h4 {
            margin-top: 20px;
            color: #333;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .qr-box {
                height: auto; /* Allow box to adjust height on smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>Generator QR Code: {{ $peserta->nama }}</h3>
            </div>
            <div class="card-body text-center">
                <h4 class="mb-4">Barcode Token: <strong>{{ $peserta->token }}</strong></h4>
                <div class="qr-box">
                    {!! $qrCode !!}
                </div>
                <div>
                    @if (Auth::check())
                        <a href="{{ route('peserta.show', $peserta->id) }}" class="btn btn-custom">Kembali</a>
                    @else 
                        <a href="{{ route('peserta.detail', $peserta->id) }}" class="btn btn-custom">Kembali</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

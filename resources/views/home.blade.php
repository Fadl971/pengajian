<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home | Web Pengajian</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
        }

        /* Header Styling */
        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
        }

        .nav-link {
            color: white;
            font-size: 1rem;
            margin-right: 15px;
        }

        .nav-link:hover {
            color: #f1f1f1;
            transition: color 0.3s ease;
        }

        .btn-outline-light:hover {
            background-color: white;
            color: #007bff;
            transform: scale(1.05);
        }

        /* Hero Section */
        .hero {
            background: url('/images/ngaji1.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .hero h1 {
            font-size: 4.5rem;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 20px;
            text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.7);
        }

        .hero p {
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 30px;
        }

        .hero .btn {
            padding: 15px 40px;
            font-size: 1.25rem;
            border-radius: 30px;
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.4);
        }

        .hero .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.6);
        }

        /* About Section */
        .about {
            background-color: #fff;
            padding: 50px 0;
        }

        .about h2 {
            font-size: 3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .about p {
            font-size: 1.1rem;
            font-weight: 400;
            color: #555;
            line-height: 1.8;
            text-align: center;
        }

        /* Footer */
        .footer {
            background-color: #333;
            color: white;
            padding: 30px 0;
            text-align: center;
        }

        .footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        /* Scroll Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 35px;
            height: 35px;
            border: 2px solid white;
            border-radius: 50%;
            animation: bounce 2s infinite;
        }

        .scroll-indicator::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 10px;
            height: 10px;
            background-color: white;
            border-radius: 50%;
            animation: scroll 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(10px);
            }
        }

        @keyframes scroll {
            0%, 100% {
                opacity: 0;
            }

            50% {
                opacity: 1;
                transform: translateX(-50%) translateY(15px);
            }
        }

    </style>
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Web Pengajian</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Selamat Datang di Pengajian Kami</h1>
            <p>Tingkat kan Iman dan Taqwa Bersama Kami</p>
           <a href="{{ route('peserta.create') }}" class="btn btn-light">Daftar Sekarang</a>
            <div class="scroll-indicator"></div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container">
            <h2>Tentang Pengajian Kami</h2>
            <p>Bergabunglah dengan komunitas pengajian kami untuk memperdalam pemahaman agama, memperkuat iman, dan mempererat tali silaturahmi. Kami menyambut semua yang ingin belajar dan berkembang bersama kami.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Web Pengajian. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

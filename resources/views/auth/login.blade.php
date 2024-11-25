<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Double Slider Registration and Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            font-family: 'Poppins', sans-serif;
            color: white;
            margin: 0;
            text-align: center;
            overflow: hidden;
        }
        .brand-logo {
            background-color: #4b4bff;
            padding: 10px 20px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 20px;
            transition: transform 0.3s;
        }
        .brand-logo span {
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .brand-logo:hover {
            transform: scale(1.05);
        }
        .main-title {
            font-size: 2.5rem;
            margin-top: 20px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 100px);

        }
        .slider-container {
            display: flex;
            background-color: #2a2a2a;
            border-radius: 20px;
            overflow: hidden;
            width: 800px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }
        .slider-left, .slider-right {
            width: 50%;
            padding: 40px;
            transition: transform 0.5s;
        }
        .slider-left {
            background: url('/images.g.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: left;
            position: relative;
            overflow: hidden;
        }
        .slider-left h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        }
        .slider-left p {
            font-size: 1rem;
            margin-bottom: 20px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }
        .slider-left a {
            background: transparent;
            border: 2px solid white;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 1rem;
            text-decoration: none;
            transition: background 0.3s, transform 0.3s;
        }
        .slider-left a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }
        .slider-right {
            background-color: white;
            color: black;
            text-align: left;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            position: relative;
            overflow: hidden;
        }
        .slider-right h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #4b4bff;
        }
        .slider-right input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        .slider-right input:focus {
            border-color: #4b4bff;
            box-shadow: 0 0 5px rgba(75, 75, 255, 0.5);
        }
        .slider-right button {
            width: 100%;
            padding: 10px;
            background-color: #4b4bff;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 1rem;
            transition: background 0.3s, transform 0.3s;
        }
        .slider-right button:hover {
            background-color: #3a3aff;
            transform: translateY(-2px);
        }
        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .social-icons a {
            color: black;
            margin: 0 10px;
            font-size: 1.5rem;
            transition: color 0.3s;
        }
        .social-icons a:hover {
            color: #4b4bff;
        }
        .form-label {
            font-weight: bold;
            color: black;
        }
        .contact-person {
            margin-top: 30px;
            color: white;
        }
        .contact-person h4 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }
        .contact-person p {
            margin: 5px 0;
            font-size: 1rem;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }
        .contact-person i {
            margin-right: 8px;
            color: #4b4bff;
        }
        .contact-divider {
        border: 0;
        height: 1px;
        background: rgba(255, 255, 255, 0.3);
        margin: 15px 0;
        }
        .admin-title {
        font-size: 2rem;
        color: #4b4bff;
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
        letter-spacing: 1px;
        text-shadow: 2px 2px 8px rgba(75, 75, 255, 0.3);
        background: -webkit-linear-gradient(#4b4bff, #3a3aff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        }

        /* Add some responsiveness */
        @media (max-width: 768px) {
            .slider-container {
                flex-direction: column;
                width: 90%;
            }
            .slider-left, .slider-right {
                width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="brand-logo">
        <span>hellocode</span>
    </div>
    <h1 class="main-title">" Welcome to our study website "</h1>
    <div class="container">
        <div class="slider-container">
            <div class="slider-left">
                <h2>Assalamualaikum</h2>
                <p>Jadilah bagian dari komunitas kami! Daftar sekarang dan ikuti kegiatan yang bermanfaat.</p>
                <a href="{{ route('peserta.create') }}" class="btn btn-light">Daftar Sekarang</a>
                <!-- Contact Person Section -->
    <div class="contact-person mt-4">
        <h4>Contact Person</h4>
        <p><i class="fas fa-phone"></i> +62 123 4567 8901</p>
        <p><i class="fas fa-envelope"></i> contact@pengajian.com</p>
        <!-- Divider -->
        <hr class="contact-divider">
        <p>Butuh bantuan? Hubungi kami.</p>
    </div>
            </div>
            <div class="slider-right">
            <h2 class="admin-title">Admin</h2> 
  
                <!-- Form Login -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4"> <!-- Flexbox untuk tata letak -->
                    <div></div> <!-- Kosongkan div ini agar Lupa Password di kanan -->
                    <p class="mb-0"><a href="{{ route('reset-password') }}" class="text-decoration-none" style="color: #4b4bff; font-weight: bold;">Lupa Password?</a></p>
                </div>
         <div class="text-center mt-4">
                        <button type="submit" class="btn btn-custom">Login</button>
                    </div>
                </form>
                
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

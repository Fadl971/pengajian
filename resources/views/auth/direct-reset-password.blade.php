<!-- resources/views/auth/direct-reset-password.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        /* Gaya yang sama seperti sebelumnya */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        label {
            display: block;
            font-weight: bold;
            color: #666;
            margin-top: 1rem;
            text-align: left;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
            outline: none;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.2);
        }

        button {
            width: 100%;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            font-size: 1rem;
            padding: 12px;
            border: none;
            border-radius: 5px;
            margin-top: 1.5rem;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            box-shadow: 0 8px 12px rgba(106, 17, 203, 0.3);
        }

        .back-button {
            background-color: #ddd;
            color: white;
            margin-top: 1rem;
            font-weight: normal;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #bbb;
        }

        .error {
            color: #e74c3c;
            margin-top: 1rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form action="{{ route('reset-password') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="you@example.com" required>

            <label for="password">New Password:</label>
            <input type="password" name="password" required>

            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">Reset Password</button>
        </form>

        <!-- Tambahkan tombol Kembali -->
        <form action="{{ route('login') }}">
            <button type="submit" class="back-button">Kembali ke Login</button>
        </form>

        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans', sans-serif;
            background-color: #DBAF50;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        }

        .login-container {
            background-color: white;
            color: #DBAF50;
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-in-out;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="email"],
        input[type="password"] {
            border: 2px solid #DBAF50;
            border-radius: 10px;
            padding: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #f0902f;
            box-shadow: 0 0 8px rgba(240, 144, 47, 0.8);
            outline: none;
        }

        button[type="submit"] {
            background-color: #DBAF50;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 15px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #f0902f;
            box-shadow: 0 5px 15px rgba(240, 144, 47, 0.5);
            transform: translateY(-2px);
        }

        button[type="submit"]:active {
            transform: translateY(0);
            box-shadow: 0 3px 10px rgba(240, 144, 47, 0.3);
        }

        .login-container p {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .login-container a {
            color: #DBAF50;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .login-container a:hover {
            color: #f0902f;
        }

        .password-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .password-container input {
            width: 100%;
            padding-right: 40px; /* Ruang untuk ikon mata */
        }

        .password-container .toggle-password {
            position: absolute;
            right: 10px;
            color: #DBAF50;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .password-container .toggle-password:hover {
            color: #f0902f;
        }


        /* Animasi */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

    </style>
</head>
<body>
    <div class="login-container" data-aos="fade-up">
        <h1>Login</h1>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
            <div class="password-container">
                <input type="password" name="password" placeholder="Password" required>
                <i data-feather="eye" class="toggle-password" style="cursor: pointer;"></i>
            </div>
        <button type="submit">Login</button>
    </form>
        <p>Belum ada akun? Silahkan <a href="{{ route('register') }}">Daftar</a></p>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
        feather.replace();
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const togglePassword = document.querySelector('.toggle-password');
        const passwordInput = document.querySelector('input[name="password"]');

        togglePassword.addEventListener('click', function () {
            // Toggle input type between 'password' and 'text'
            const isPasswordVisible = passwordInput.type === 'text';
            passwordInput.type = isPasswordVisible ? 'password' : 'text';

            // Change icon using Feather Icons
            this.setAttribute('data-feather', isPasswordVisible ? 'eye' : 'eye-off');
            feather.replace(); // Refresh Feather icons
        });
    });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        /* Basic styling for the container */
        .register-container {
            background-color: #fff;
            padding: 40px;
            max-width: 400px;
            margin: 50px auto;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 900;
            color: #DBAF50;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Style for input fields */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #DBAF50;
            border-radius: 8px;
            background-color: #f9f9f9;
            font-size: 1rem;
            color: #333;
            transition: border-color 0.3s ease;
        }

        /* Focus effect on input fields */
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #f0902f;
            outline: none;
        }

        /* Style for the toggle password icon */
        .password-field {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #DBAF50;
        }

        /* Register button */
        .register-btn {
            width: 100%;
            padding: 12px;
            background-color: #DBAF50;
            border: none;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
        }

        /* Hover effect on Register button */
        .register-btn:hover {
            background-color: #f0902f;
            transform: scale(1.05);
        }

        /* Styling for the Login link */
        p {
            font-size: 1rem;
            text-align: center;
            margin-top: 15px;
        }

        p a {
            color: #DBAF50;
            text-decoration: none;
        }

        p a:hover {
            color: #f0902f;
        }

        /* Animation and transition */
        .register-container {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head> 
<body>
    <div class="register-container">
        <h1 class="text-center" data-aos="fade-up">Register</h1>
        @if (session('success'))
          <div class="alert alert-success">
             {{ session('success') }}
          </div>
        @endif

    <!-- Tampilkan Pesan Error -->
        @if ($errors->any())
          <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                 @endforeach
             </ul>
          </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="register-form">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone_number" placeholder="Phone Number" required>
            <div class="password-field">
                <input type="password" name="password" placeholder="Password" required>
                <i class="toggle-password" data-feather="eye" style="cursor: pointer;"></i>
            </div>
            <div class="password-field">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <i class="toggle-password" data-feather="eye" style="cursor: pointer;"></i>
            </div>
            <button type="submit" class="register-btn">Register</button>
        </form>

        <p class="text-center">Sudah punya akun? Silahkan <a href="{{ route('login') }}">Login</a></p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
        feather.replace();

        // Toggle password visibility script
        document.addEventListener('DOMContentLoaded', () => {
            const togglePassword = document.querySelectorAll('.toggle-password');
            togglePassword.forEach(item => {
                item.addEventListener('click', function () {
                    const passwordInput = this.previousElementSibling;
                    const isPasswordVisible = passwordInput.type === 'text';
                    passwordInput.type = isPasswordVisible ? 'password' : 'text';
                    this.setAttribute('data-feather', isPasswordVisible ? 'eye' : 'eye-off');
                    feather.replace();
                });
            });
        });
    </script>
</body>
</html>

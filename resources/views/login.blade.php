<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo.jpg') }}" rel="icon" class="rounded-circle">
    <link href="{{ asset('assets/img/logo.jpg') }}" rel="apple-touch-icon" class="rounded-circle">

    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Login Sistem</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f9;
        }

        .login-container {
            display: flex;
            width: 80%;
            max-width: 1200px;
            height: 600px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            overflow: hidden;
            border: 2px solid #007bff; /* Menambahkan border untuk mempercantik */
        }

        /* Bagian Kiri: Gambar */
        .login-image {
            flex: 1;
            background: url('{{ asset("assets/img/sd.webp") }}') no-repeat center center;
            background-size: cover;
            position: relative;
            transition: transform 0.3s ease; /* Efek transisi untuk gambar */
            filter: brightness(70%);
        }

        /* Efek Parallax Gambar */
        .login-image:hover {
            transform: scale(1.1); /* Gambar akan sedikit membesar saat hover */
        }

        .login-image:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4); /* Menambahkan overlay gelap pada gambar */
        }

        .login-image .caption {
            position: absolute;
            bottom: 30px;
            left: 20px;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        /* Bagian Kanan: Form Login */
        .login-form {
            flex: 1;
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form .logo img {
            max-width: 150px; /* Meningkatkan ukuran logo */
            margin: 0 auto 20px auto;
            display: block;
        }

        .login-form .name {
            font-size: 1.8rem; /* Menambahkan ukuran font yang lebih besar */
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        .form-field {
            margin-bottom: 15px;
            position: relative;
        }

        .form-field input {
            width: 100%;
            padding: 10px 15px 10px 35px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-field span {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #777;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn:hover {
            background: #0056b3;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                height: auto;
            }

            .login-image {
                height: 250px; /* Menyesuaikan tinggi gambar */
                background-size: cover;
                background-position: center; /* Menjaga gambar agar tetap terpusat */
            }
        }
        
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Bagian Kiri: Gambar -->
        <div class="login-image">
            <div class="caption">Selamat datang di Sistem Informasi Pembayaran SPP</div>
        </div>

        <!-- Bagian Kanan: Form Login -->
        <div class="login-form">
            <div class="logo">
                <img src="{{ asset('assets/img/logosd.png') }}" alt="Logo">
            </div>
            <div class="text-center name">
                Sistem Informasi Pembayaran SPP
            </div>

            @if(session('wrong'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                    {{ session('wrong') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="post" action="/login">
                @csrf
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="pwd" placeholder="Password">
                </div>
                <button type="submit" class="btn mt-3">Login</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>

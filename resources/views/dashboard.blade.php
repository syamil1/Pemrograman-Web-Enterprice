<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap" rel="stylesheet">
    
    <style>
         body {
            margin: 0;
            font-family: 'Noto Sans', sans-serif;
            color: #333;
            background-color: #f8f9fa;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        .navbar {
            background-color: #DBAF50;
            position: fixed;
            z-index: 1000;
            width: 100%;
            top: 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan untuk kesan modern */
        }

        .navbar-brand {
            color: black; /* Warna default teks */
            font-weight: bold;
            font-size: 1.8rem; /* Sedikit lebih besar untuk penekanan */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); /* Bayangan halus untuk kedalaman */
            transition: transform 0.3s ease, text-shadow 0.3s ease, color 0.3s ease; /* Efek transisi lembut */
            margin-left: -100px;
        }

        .navbar-brand span {
            color: #ffffff; /* Warna berbeda untuk highlight */
            font-style: italic; /* Menambah variasi */
            text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.8); /* Sedikit glow pada span */
        }

        /* Efek Hover */
        .navbar-brand:hover {
            color: #f0902f; /* Warna hover menjadi oranye terang */
            text-shadow: 
                0 0 10px rgba(240, 144, 47, 0.8), /* Glowing utama */
                0 0 20px rgba(240, 144, 47, 0.6), /* Lapisan glow tambahan */
                0 0 30px rgba(240, 144, 47, 0.4); /* Glow lembut */
            transform: scale(1.1); /* Membesar sedikit untuk kesan interaktif */
        }

       /* Default Nav-link */
        .nav-link {
            color: #ffffff; /* Warna default link, putih untuk kontras */
            position: relative;
            font-weight: 600; /* Sedikit tebal */
            font-size: 1rem; /* Ukuran teks yang pas */
            transition: color 0.3s ease, transform 0.3s ease;
            margin-right: 20px;
        }

        .navbar-nav {  
            margin-right: -150px;
        }

        /* Hover color and underline animation */
        .nav-link:hover {
            color: #f7f7f7; /* Warna teks saat di-hover, sedikit lebih terang */
            transform: scale(1.05); /* Sedikit pembesaran untuk efek hover */
        }

        .nav-link::after {
            content: ""; /* Pseudo-element for underline */
            position: absolute;
            left: 0;
            right: 0;
            bottom: -5px;
            height: 2px;
            background: #ffffff; /* Warna underline */
            transform: scaleX(0); /* Mulai dengan garis yang tidak terlihat */
            transform-origin: left; /* Garis muncul dari kiri ke kanan */
            transition: transform 0.3s ease;
        }

        /* Show underline on hover */
        .nav-link:hover::after {
            transform: scaleX(1); /* Garis muncul saat hover */
        }

        /* Active Link State */
        .nav-link.active {
            color: #ffffff; /* Warna teks link aktif */
        }

        .nav-link.active::after {
            transform: scaleX(1); /* Garis bawah terlihat */
            background: #f7f7f7; /* Warna underline aktif lebih terang */
        }

        .welcome-section {
            margin-top: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-size: cover;
            background-position: center;
            animation: bg-change 20s infinite;
            height: 100vh; /* Penuh layar */
            background-color:#F8F9FA; /* Biru navy */
            color: #fff;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 100px;
        }        

        /* Keyframes for background change */
        @keyframes bg-change {
            0% {
                background-image: url({{ asset('assets/bg1.jpg') }});
            }
            33% {
                background-image: url({{ asset('assets/bg2.jpg') }});
            }
            66% {
                background-image: url({{ asset('assets/bg3.jpg') }});
            }
            100% {
                background-image: url({{ asset('assets/bg4.jpg') }});
            }
        }

        .welcome-section h1 {
            font-weight: 900;
            color: #f0902f;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 1);
            font-size: 3rem;
        }

        /* Tambahkan styling untuk teks */
        .welcome-text {
            font-size: 2rem;
            font-weight: bold;
            line-height: 1.5;
            color: #DBAF50;
             text-shadow: 1px 1px 3px rgba(0, 0, 0, 1);
        }

        /* General Container Styling */
        .container {
            max-width: 1140px; /* Batasi lebar maksimum agar tidak terlalu besar */
            margin: 0 auto; /* Pusatkan kontainer di tengah layar */
            padding: 0 20px; /* Beri sedikit ruang di sisi dalam */
            box-sizing: border-box; /* Pastikan padding dihitung dalam total ukuran */
        }

        /* Heading Styling */
        h2 {
            font-weight: bold;
            font-size: 2.2rem;
            color: #DBAF50;
            margin-bottom: 100px;
            position: relative;
            text-transform: uppercase;
            text-align: center;
        }

        h2::after {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background: #DBAF50;
            margin: 10px auto 0;
        }

        /* Card Container Styling */
        .card-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Tetap tiga kolom */
            gap: 20px;
            justify-items: center;
        }

        @media (max-width: 992px) { /* Untuk layar sedang */
            .card-container {
                grid-template-columns: repeat(2, 1fr); /* Dua kolom */
            }
        }

        @media (max-width: 768px) { /* Untuk layar kecil */
            .card-container {
                grid-template-columns: 1fr; /* Satu kolom */
            }
        }

        /* Card Styling */
        .card {
            background: #ffffff;
            border-radius: 15px;
            width: 400px; /* Sesuaikan dengan kebutuhan */
            height: 400px; /* Ukuran persegi untuk kartu */
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            cursor: pointer;
            display: flex;
            /* flex-direction: column; */
            justify-content:center;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        /* Card Image */
        .card img {
            width: 100%; /* Isi seluruh lebar kartu */
            height: 100%; /* Isi seluruh tinggi kartu */
            object-fit: contain;
            object-position: center;
            transition: transform 0.3s ease;
        }

        .card:hover img {
            transform: scale(1.1);
        }

        /* Title Overlay */
        .card-title {
            position: absolute;
            bottom: 15px;
            left: 15px;
            right: 15px;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.6) 100%);
            color: #ffffff;
            padding: 10px 15px;
            font-size: 1.4rem;
            font-weight: bold;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }

        .card:hover .card-title {
            background: rgba(0, 0, 0, 0.8);
            color: #dbaf50; /* Warna emas saat hover */
        }

        /* Views Info */
        .card .views-info {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(0, 0, 0, 0.5);
            color: #ffffff;
            font-size: 1rem;
            padding: 5px 10px;
            border-radius: 5px;
            z-index: 1;
            transition: opacity 0.3s ease;
        }

        .card:hover .views-info {
            background: rgba(0, 0, 0, 0.8);
            color: #dbaf50; /* Warna emas saat hover */
        }

        /* Hover Effects */
        .card:hover .card-title,
        .card:hover .views-info {
            opacity: 1;
        }

       button.upload-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px; /* Ukuran awal tombol */
            height: 60px;
            border-radius: 50%;
            background-color: #DBAF50;
            color: white;
            font-size: 1rem;
            font-weight: 500;
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
            position: fixed; /* Tombol tetap di posisi yang sama saat scroll */
            bottom: 20px; /* Jarak dari bawah */
            right: 20px; /* Jarak dari kanan */
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
            z-index: 1000; /* Pastikan tombol ada di atas elemen lain */
            overflow: hidden;
        }

        button.upload-btn:hover {
            width: 200px; /* Perluas tombol */
            border-radius: 35px; /* Bentuk lebih persegi panjang */
            justify-content: start; /* Teks rata kiri */
            padding-left: 20px; /* Jarak teks dari ikon */
            box-shadow: 0px 12px 25px rgba(0, 0, 0, 0.4);
        }

        button.upload-btn::before {
            content: ""; /* Awalnya tidak ada teks */
            position: relative;
            opacity: 0; /* Sembunyikan teks */
            transition: opacity 0.3s ease, transform 0.3s ease; /* Animasi halus */
            transform: translateX(-20px); /* Geser teks sedikit ke kiri */
        }

        button.upload-btn:hover::before {
            content: "Upload Resep"; /* Tambahkan teks saat hover */
            opacity: 1; /* Tampilkan teks */
            transform: translateX(0); /* Kembalikan teks ke posisi normal */
            margin-left: 15px; /* Jarak antara teks dan ikon */
            white-space: nowrap; /* Pastikan teks tetap dalam satu baris */
            margin-right: 30px;
        }
    </style>
</head>
<body>
    
@include('layouts.navbar')

    <section class="welcome-section">
        <h1>Halo, {{ $username }}! Selamat datang di aplikasi kami.</h1>
        <h2 class="welcome-text">
            <span id="typed-text"></span>
        </h2>
    </section>


    <div class="container" style="height: 100vh">
        <h2 class="text-center my-4" data-aos="fade-right" style="color: #DBAF50;">Makanan Populer</h2>
        <div class="card-container" data-aos="fade-up">
            @if($makananPopuler->isEmpty())
                <p class="text-center">Tidak ada makanan populer saat ini.</p> 
            @else
                @foreach($makananPopuler as $resep)
                    <div class="card">
                        <a href="/resep/{{ $resep->id }}">
                            <img src="{{ asset('storage/' . $resep->image_path) }}" alt="{{ $resep->title }}">
                            <div class="card-title">{{ $resep->title }}</div>
                            <p class="views-info">{{ $resep->total_views }} x dilihat</p>
                        </a>
                    </div>       
                @endforeach
            @endif
        </div>
    </div>

    <div class="container" style="height: 100vh">
        <h2 class="text-center my-4" data-aos="fade-right" style="color: #DBAF50;">Minuman Populer</h2>
        <div class="card-container" data-aos="fade-up">
            @if($minumanPopuler->isEmpty())
                <p class="text-center">Tidak ada minuman populer saat ini.</p>
            @else
                @foreach($minumanPopuler as $resep)
                    <div class="card">
                        <a href="/resep/{{ $resep->id }}">
                            <img src="{{ asset('storage/' . $resep->image_path) }}" alt="{{ $resep->title }}">
                            <div class="card-title">{{ $resep->title }}</div>
                         <p class="views-info">{{ $resep->total_views }} x dilihat</p>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Floating Upload Button -->
    <button class="upload-btn" onclick="location.href='{{ route('reseps.create') }}'">
        <i data-feather="plus"></i>
    </button>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        AOS.init();
        feather.replace();
    </script>
     <script>
        setTimeout(function() {
        // Inisialisasi Typed.js
        var typed = new Typed('#typed-text', {
            strings: ["Mau masak apa hari ini?", "Buat resep sebanyak mungkin!", "Kreasi masakan untuk setiap momen!"],
            typeSpeed: 50,  // Kecepatan mengetik
            backSpeed: 30,  // Kecepatan menghapus
            loop: true      // Loop animasi
        });
         }, 1000);
    </script>
</body>
</html>

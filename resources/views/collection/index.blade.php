<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
            margin-right: -50px;
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

       /* General Styling */
body {
    font-family: 'Noto Sans', Arial, sans-serif;
    background-color: #ffffff; /* Warna latar belakang putih */
    color: #333;
    line-height: 1.6;
}

/* Search Form Styling */
.search-form {
    margin-top: 100px;
    display: flex;
    justify-content: center;
}

.search-form .form-control {
    border-radius: 30px 0 0 30px;
    padding: 0.75rem 1.5rem;
    border: 2px solid #DBAF50;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.search-form .form-control:focus {
    border-color: #c49b45;
    outline: none;
    box-shadow: 0 4px 10px rgba(219, 175, 80, 0.4);
}

.search-form .btn {
    background-color: #DBAF50;
    border: 2px solid #DBAF50;
    border-radius: 0 30px 30px 0;
    padding: 0.75rem 1.5rem;
    color: #fff;
    font-weight: bold;
    transition: all 0.3s ease;
}

.search-form .btn:hover {
    background-color: #c49b45;
    border-color: #c49b45;
    box-shadow: 0 4px 10px rgba(219, 175, 80, 0.4);
}

/* Recipe and History Cards */
.recipe-card, .history-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffffff;
    border-radius: 10px;
    padding: 1rem;
    margin-bottom: 1rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #DBAF50; /* Border emas */
}

.recipe-card:hover, .history-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    border-color: #c49b45;
}

.recipe-info, .history-info {
    flex-grow: 1;
    margin-right: 1rem;
}

.recipe-title, .history-title {
    font-size: 1.25rem;
    font-weight: bold;
    color: #DBAF50;
    margin-bottom: 0.5rem;
}

/* General Styling */
a {
    text-decoration: none; /* Menghilangkan underline secara global */
    color: inherit; /* Memastikan warna teks mengikuti gaya elemen dalamnya */
    transition: color 0.3s ease; /* Transisi halus untuk perubahan warna */
}

/* Styling khusus untuk card dalam tag <a> */
.recipe-card a, .history-card a {
    display: flex;
    flex-direction: row; /* Atur elemen dalam baris */
    align-items: center;
    color: #333; /* Warna default teks */
    text-decoration: none; /* Pastikan tidak ada underline */
    font-size: 1rem; /* Ukuran huruf default */
    transition: color 0.3s ease, transform 0.3s ease;
}

.recipe-card a:hover, .history-card a:hover {
    color: #DBAF50; /* Warna emas saat dihover */
    transform: translateY(-3px); /* Sedikit elevasi */
}

/* Styling khusus untuk teks judul dalam card */
.recipe-title, .history-title {
    font-size: 1.25rem; /* Ukuran teks judul */
    font-weight: bold; /* Huruf tebal */
    color: #DBAF50; /* Warna emas */
    margin-bottom: 0.5rem; /* Jarak bawah */
    transition: color 0.3s ease;
}

.recipe-title:hover, .history-title:hover {
    color: #c49b45; /* Variasi warna emas saat dihover */
}

/* Styling untuk teks lainnya */
.recipe-upload-date, .history-date, .uploaded-by {
    font-size: 0.9rem; /* Ukuran lebih kecil */
    color: #777; /* Warna abu-abu */
}

/* Gaya tambahan untuk gambar dalam card */
.recipe-image img, .history-image img {
    max-width: 100px; /* Ukuran maksimal gambar */
    height: auto; /* Menjaga rasio gambar */
    border-radius: 10px; /* Border bundar */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 2px solid #DBAF50; /* Border emas */
}

.recipe-image img:hover, .history-image img:hover {
    transform: scale(1.1); /* Sedikit pembesaran */
    box-shadow: 0 4px 10px rgba(219, 175, 80, 0.4); /* Efek bayangan */
}




/* Delete Button */
form .btn-danger {
    background-color: #ff4d4f;
    border: none;
    border-radius: 20px;
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
    font-weight: bold;
    color: #fff;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

form .btn-danger:hover {
    background-color: #e04141;
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(255, 77, 79, 0.3);
}

/* Header and Section Titles */
h3 {
    color: #DBAF50;
    border-bottom: 2px solid #DBAF50;
    padding-bottom: 0.5rem;
    margin-bottom: 1rem;
    font-weight: bold;
}

/* Hover Transitions */
.recipe-card:hover .recipe-title, 
.history-card:hover .history-title {
    color: #c49b45;
}

.recipe-image img {
    width: 150px; /* atau ukuran lain yang sesuai */
    height: 150px; /* buat ukuran konsisten */
    object-fit: cover; /* memastikan gambar dipotong agar sesuai */
    border-radius: 8px; /* opsional, untuk membuat sudut melengkung */
}

    </style>
</head>
<body>
@include('layouts.navbar')

<div class="container" style="height: 100vh; margin-top: 100px;">
    <h3 class="text-center my-4" style="color: #DBAF50;">Koleksi Resep Anda</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($bookmarks->isEmpty())
        <p class="text-center">Belum ada resep yang disimpan di koleksi.</p>
    @else
        <div class="card-container" style="display: flex; flex-wrap: wrap; gap: 20px;">
            @foreach($bookmarks as $bookmark)
                <div class="card" style="width: 18rem; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative;">
                    <a href="{{ route('resep.show', $bookmark->resep->id) }}" style="text-decoration: none; position: relative; z-index: 1;">
                        <img src="{{ asset('storage/' . $bookmark->resep->image_path) }}" class="card-img-top" alt="{{ $bookmark->resep->title }}" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #FFFFFF; transition: color 0.3s; z-index: 1;">
                                {{ $bookmark->resep->title }}
                            </h5>
                        </div>
                    </a>
                    <div class="card-body">
                        <p class="card-text">
                            Diunggah oleh {{ $bookmark->resep->user->username }}
                        </p>
                        <form action="{{ route('collection.destroy', $bookmark->resep->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-2" style="position: relative; z-index: 2;">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>



</body>
</html>
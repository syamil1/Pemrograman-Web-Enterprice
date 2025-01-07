<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $resep->title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap" rel="stylesheet">
    <style>
        /* General Styling */
        body {
            background: linear-gradient(135deg, #1f1f1f, #2e2e2e);
            color: #f4f4f4;
            font-family: 'Noto Sans', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* Container */
        .container {
            padding: 30px;
            max-width: 100%;
        }

        /* Image Styling */
        img.img-fluid {
            width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        img.img-fluid:hover {
            transform: scale(1.05);
        }

        /* Recipe Details */
        .resep-details h1 {
            font-size: 2.8rem;
            font-weight: bold;
            color: #ffaf4b;
            text-align: left;
            margin-bottom: 15px;
            text-shadow: 0 4px 10px rgba(255, 175, 75, 0.7);
        }

        .resep-details p {
            font-size: 1rem;
            color: #cccccc;
            margin-bottom: 15px;
        }

        .resep-details h3 {
            font-size: 1.5rem;
            color: #ffaf4b;
            margin-bottom: 10px;
            border-left: 4px solid #ffaf4b;
            padding-left: 10px;
        }

        /* List Items */
        .list-group-item {
            background: linear-gradient(135deg, #333333, #444444);
            color: #f4f4f4;
            padding: 15px;
            margin-bottom: 10px;
            border: none;
            border-left: 5px solid #ffaf4b;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .list-group-item:hover {
            transform: translateX(10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        /* Actions (Like and Comment Buttons) */
        .actions {
            margin-top: 20px;
            display: flex;
            gap: 15px;
        }

        .btn-like,
        .btn-comment {
            background: none;
            border: none;
            color: #ffaf4b;
            font-size: 1.5rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .btn-like:hover,
        .btn-comment:hover {
            transform: scale(1.1);
            color: #ffc066;
        }

        .btn-like.liked {
            color: #ff4b5c; /* Merah untuk ikon like yang aktif */
        }

        /* Comments Section */
        .comments-section {
            background: linear-gradient(135deg, #333333, #444444);
            border: 1px solid #555;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            margin-top: 30px;
            animation: fadeIn 0.6s ease;
        }

        textarea.form-control {
            resize: none;
            border: 1px solid #ffaf4b;
            background: #2e2e2e;
            color: #f4f4f4;
            border-radius: 8px;
            padding: 10px;
            font-size: 1rem;
            width: 100%;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        textarea.form-control:focus {
            border-color: #ffc066;
            box-shadow: 0 0 10px rgba(255, 175, 75, 0.5);
        }

        /* Comment List */
        .comments-section ul {
            list-style: none;
            padding: 0;
        }

        .comments-section ul li {
            background: #2e2e2e;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            color: #f4f4f4;
            position: relative;
        }

        .comments-section ul li strong {
            color: #ffaf4b;
        }

        .comments-section ul li small {
            color: #a0a0a0;
            display: block;
            margin-top: 5px;
        }

        /* Delete Comment Button */
        button.btn-danger {
            position: absolute;
            right: 10px;
            top: 10px;
            background: none;
            border: none;
            color: #ff4b5c;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        button.btn-danger:hover {
            transform: scale(1.2);
            color: #ff6b7a;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Buttons */
        button.btn-success {
            background-color: #ffaf4b;
            border: none;
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        button.btn-success:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(255, 175, 75, 0.4);
        }

        /* Button Back to Dashboard */
        .btn-back-dashboard {
            display: inline-block;
            background: linear-gradient(135deg, #DBAF50, #f2ca80);
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            margin-bottom: 20px; /* Beri jarak dengan form */
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1), 0 4px 15px rgba(219, 175, 80, 0.3);
        }

        .btn-back-dashboard:hover {
            background: linear-gradient(135deg, #c29244, #dba850);
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(219, 175, 80, 0.5);
        }

        .btn-back-dashboard:active {
            transform: translateY(2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15), 0 4px 10px rgba(219, 175, 80, 0.4);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- Gambar Resep -->
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $resep->image_path) }}" alt="Resep Gambar" class="img-fluid mb-4">
                <div class="mb-4">
           
                <!-- Resep Details -->
                <div class="resep-details">
                    <h1>{{ $resep->title }}</h1>
                    <p><strong>Pengunggah:</strong> {{ $resep->user->username }}</p> <!-- Tampilkan username pengunggah -->
                    <p><strong>Deskripsi:</strong></p>
                    <p class="text-justify">{{ $resep->descriptions }}</p>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <p><strong>Waktu Memasak:</strong> {{ $resep->cooking_time }} menit</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Porsi:</strong> {{ $resep->portion }} orang</p>
                        </div>
                    </div>

                     <h3>Bahan-bahan:</h3>
                    <ul class="list-group mb-4">
                        @foreach(explode("\n", $resep->ingredients) as $ingredient)
                            <li class="list-group-item">{{ $ingredient }}</li>
                        @endforeach
                    </ul>

                    <h3>Langkah-langkah:</h3>
                    <ol class="list-group mb-4">
                        @foreach(explode("\n", $resep->steps) as $step)
                            <li class="list-group-item">{{ $step }}</li>
                        @endforeach
                    </ol>
                </div>
                <!-- Tombol Simpan ke Koleksi -->
<form action="{{ route('collection.store', $resep->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-warning">Simpan ke Koleksi</button>
</form>

                <a href="/dashboard" class="btn-back-dashboard">Kembali ke Dashboard</a>
                <a href="{{ route('resep.downloadPDF', $resep->id) }}" class="btn btn-warning"> Download PDF
                </a>
            <div class="actions d-flex align-items-center">
                <!-- Tombol Like -->
                <form action="{{ route('like.toggle', $resep->id) }}" method="POST" onsubmit="event.preventDefault(); toggleLike(this.querySelector('button'));">
                    @csrf
                    <button type="submit" class="btn btn-like {{ $resep->likes()->where('user_id', auth()->id())->exists() ? 'liked' : '' }}">
                        <i data-feather="heart"></i> <span>{{ $resep->likes()->count() }}</span>
                    </button>
                </form>

                <!-- Tombol Comment -->
                <button type="button" class="btn btn-comment" onclick="toggleComments()">
                    <i data-feather="message-circle"></i> <span>{{ $resep->comments()->count() }}</span>
                </button>
            </div>

            <!-- Komentar -->
            <div class="comments-section mt-4 d-none">
                <h3>Komentar:</h3>
                <form action="{{ route('reseps.comment', $resep->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="comment" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Kirim Komentar</button>
                </form>
                <ul class="list-group mt-3">
                    @forelse ($resep->comments as $comment)
                        <li class="list-group-item">
                            <strong>{{ $comment->user->username ?? 'Anonim' }}</strong>: {{ $comment->comment }}
                            <br>
                            <small>{{ $comment->created_at->diffForHumans() }}</small>
                            @if(Auth::id() === $comment->user_id)
                        <button class="btn btn-danger btn-sm float-end" onclick="deleteComment({{ $comment->id }})">
                            <i data-feather="trash-2"></i> Hapus
                        </button>
                    @endif
                        </li>
                    @empty
                        <li class="list-group-item">Belum ada komentar.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        feather.replace();
    </script>
    <script>
    function toggleLike(button) {
        const form = button.closest('form');  // Mendapatkan form yang berisi tombol like
        const resepId = form.action.split('/').pop();  // Mendapatkan ID resep dari URL aksi

        // Mengirim permintaan POST ke server untuk toggle like
        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ resep_id: resepId }),  // Kirim data resep_id
        })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            // Update jumlah like dan status tombol setelah response
            const likeCount = button.querySelector('span');
            likeCount.textContent = data.likeCount;

            // Toggle class liked
            if (data.liked) {
                button.classList.add('liked');
            } else {
                button.classList.remove('liked');
            }
        })
        .catch((err) => {
            console.error('Error:', err);
        });
    }



    // Mengatur toggle komentar
    function toggleComments() {
        const commentsSection = document.querySelector('.comments-section');
        commentsSection.classList.toggle('d-none');
    }

    function deleteComment(commentId) {
        if (!confirm('Apakah Anda yakin ingin menghapus komentar ini?')) {
            return;
        }

        fetch(`/comments/${commentId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hapus elemen komentar dari DOM
                document.querySelector(`button[onclick="deleteComment(${commentId})"]`).closest('li').remove();
            } else {
                alert(data.message || 'Gagal menghapus komentar.');
            }
        })
        .catch(error => console.error('Error:', error));
    }   
    </script>
</body>
</html>
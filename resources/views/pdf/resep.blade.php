<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $resep->title }}</title>
    <style>
        body {
            font-family: 'Arial, sans-serif';
            line-height: 1.6;
        }
        h1 {
            color: #ffaf4b;
            text-align: center;
        }
        .details {
            margin: 20px 0;
        }
        .details p {
            margin: 5px 0;
        }
        .section-title {
            font-weight: bold;
            margin-top: 20px;
            color: #333;
        }
        ul, ol {
            margin: 0;
            padding-left: 20px;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>{{ $resep->title }}</h1>
    <div class="details">
        <p><strong>Pengunggah:</strong> {{ $resep->user->username }}</p>
        <p><strong>Waktu Memasak:</strong> {{ $resep->cooking_time }} menit</p>
        <p><strong>Porsi:</strong> {{ $resep->portion }} orang</p>
        <p><strong>Deskripsi:</strong> {{ $resep->descriptions }}</p>
    </div>

    <div>
        <h2 class="section-title">Bahan-bahan:</h2>
        <ul>
            @foreach(explode("\n", $resep->ingredients) as $ingredient)
                <li>{{ $ingredient }}</li>
            @endforeach
        </ul>
    </div>

    <div>
        <h2 class="section-title">Langkah-langkah:</h2>
        <ol>
            @foreach(explode("\n", $resep->steps) as $step)
                <li>{{ $step }}</li>
            @endforeach
        </ol>
    </div>
</body>
</html>

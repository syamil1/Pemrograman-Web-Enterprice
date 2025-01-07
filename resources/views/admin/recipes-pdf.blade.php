<!-- resources/views/admin/recipes-pdf.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Resep</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Daftar Resep</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Waktu Memasak</th>
                <th>Dibuat Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
            <tr>
                <td>{{ $recipe->id }}</td>
                <td>{{ $recipe->title }}</td>
                <td>{{ $recipe->descriptions }}</td>
                <td>{{ $recipe->cooking_time }} menit</td>
                <td>{{ $recipe->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

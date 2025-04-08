<!-- resources/views/food/history.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Búsquedas</title>
</head>
<body>
    <h1>Historial de Búsquedas</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Término de búsqueda</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($searches as $search)
                <tr>
                    <td>{{ $search->id }}</td>
                    <td>{{ $search->search_term }}</td>
                    <td>{{ $search->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            font-size: 24px;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        .movie-details, .ticket-details {
            margin-top: 20px;
        }
        .ticket-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .ticket-details table, .ticket-details th, .ticket-details td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .ticket-details th {
            background-color: #f4f4f4;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="movie-details">
            <h2>Detalles de la Película</h2>
            <p><strong>Título:</strong> {{ $movieData['title'] }}</p>
            <p><strong>Género:</strong> {{ $movieData['genre'] }}</p>
            <p><strong>Año:</strong> {{ $movieData['year'] }}</p>
            <p><strong>Duración:</strong> {{ $movieData['duration'] }} minutos</p>
            <p><strong>Calificación:</strong> {{ $movieData['rating'] }}</p>
            <p><strong>Director:</strong> {{ $movieData['director'] }}</p>
            <p><strong>Idioma:</strong> {{ $movieData['language'] }}</p>
            <p><strong>Fecha y hora:</strong> {{ $movieData['dia']['fecha'] ?? 'No especificado' }} {{ $movieData['dia']['hora'] ?? '' }}</p>
        </div>

        <div class="ticket-details">
            <h2>Detalles de las Entradas</h2>
            <table>
                <tr>
                    <th>Fila</th>
                    <th>Columna</th>
                </tr>
                @foreach($ticketDetails as $ticket)
                <tr>
                    <td>{{ $ticket['fila'] }}</td>
                    <td>{{ $ticket['columna'] }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="footer">
            <p>Gracias por usar TaquillaXpress.</p>
        </div>
    </div>
</body>
</html>
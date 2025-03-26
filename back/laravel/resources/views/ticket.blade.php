<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #333333;
            background-color: #f0f0f0;
            padding: 20px;
            margin: 0;
            line-height: 1.4;
        }

        .ticket {
            background-color: #ffffff;
            border-radius: 12px;
            margin: 0 auto;
            max-width: 600px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .ticket-banner {
            background: #454545;
            background: linear-gradient(to right, #454545, #656565);
            color: white;
            padding: 25px 20px;
            text-align: center;
        }

        .ticket-banner h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .ticket-content {
            padding: 0 20px 20px;
        }

        .movie-info {
            display: flex;
            flex-wrap: wrap;
            margin: 20px 0;
            background: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
        }

        .movie-poster {
            flex: 1 0 40%;
            max-width: 40%;
        }

        .movie-poster img {
            width: 100%;
            height: auto;
            display: block;
        }

        .movie-details {
            flex: 1 0 60%;
            padding: 15px;
        }

        .movie-details h3 {
            color: #ff7b00;
            margin: 0 0 10px 0;
            padding-bottom: 8px;
            border-bottom: 2px solid #ff7b00;
            font-size: 18px;
        }

        .movie-details p {
            margin: 8px 0;
            font-size: 14px;
        }

        .movie-details strong {
            font-weight: 600;
        }

        .section {
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        .section-header {
            background: #454545;
            background: linear-gradient(to right, #454545, #656565);
            color: white;
            padding: 12px 15px;
            font-weight: 600;
            font-size: 16px;
        }

        .section-content {
            padding: 15px;
            background: white;
            border: 1px solid #eaeaea;
            border-top: none;
        }

        .info-grid {
            display: flex;
            flex-wrap: wrap;
            margin: -8px;
        }

        .info-box {
            flex: 1 0 calc(50% - 16px);
            margin: 8px;
            background: #f1f7fe;
            padding: 12px;
            border-radius: 6px;
            border-left: 4px solid #1e90ff;
            width: 100%;
        }

        .info-box-orange {
            background: #fff5eb;
            border-left: 4px solid #ff7b00;
        }

        .info-label {
            font-size: 13px;
            margin-bottom: 5px;
            color: #666666;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: #333333;
        }

        .purchase-summary {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .purchase-header {
            background: #454545;
            background: linear-gradient(to right, #454545, #656565);
            color: white;
            padding: 12px 15px;
            font-weight: 600;
            font-size: 16px;
        }

        .purchase-content {
            padding: 15px;
        }

        .purchase-table {
            width: 100%;
            border-collapse: collapse;
        }

        .purchase-table th {
            background-color: #eeeeee;
            color: #333333;
            padding: 10px;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
        }

        .purchase-table td {
            padding: 10px;
            border-bottom: 1px solid #eeeeee;
            font-size: 14px;
        }

        .purchase-table td[style*="center"] {
            text-align: center;
        }

        .total-row td {
            padding: 12px 10px;
            background-color: #fff5eb;
            font-weight: 600;
            font-size: 16px;
            color: #ff7b00;
            border-top: 2px solid #ff7b00;
            border-bottom: none;
        }

        .seat-info {
            text-align: center;
        }

        .seats-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            justify-items: center;
            margin-top: 15px;
        }

        .seat {
            background: #ff7b00;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            text-align: center;
            max-width: 100%;
        }

        .ticket-footer {
            background: #454545;
            background: linear-gradient(to right, #454545, #656565);
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }

        .footer-logo {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333333;
        }

        .footer-info {
            margin: 15px 0;
        }

        @media only screen and (max-width: 480px) {

            .movie-poster,
            .movie-details {
                flex: 1 0 100%;
                max-width: 100%;
            }

            .info-box {
                flex: 1 0 100%;
            }
        }
    </style>
</head>

<body>
    <div class="ticket">
        <div class="ticket-banner">
            <h1>¡Tu Entrada para {{ $movieData['title'] }}!</h1>
        </div>

        <div class="ticket-content">
            <div class="movie-info">
                <div class="movie-poster">
                    <img src="{{ $movieData['poster'] }}" alt="Póster de {{ $movieData['title'] }}" width="100%">
                </div>
                <div class="movie-details">
                    <h3>{{ $movieData['title'] }}</h3>
                    <p><b>Género:</b> {{ $movieData['genre'] }}</p>
                    <p><b>Director:</b> {{ $movieData['director'] }}</p>
                    <p><b>Año:</b> {{ $movieData['year'] }}</p>
                    <p><b>Clasificación:</b> {{ $movieData['rated'] }}</p>
                </div>
            </div>

            <div class="section">
                <div class="section-header">
                    Fecha y Hora
                </div>
                <div class="section-content">
                    <div class="info-grid">
                        <div class="info-box">
                            <div class="info-label">Fecha</div>
                            <div class="info-value">
                                {{ \Carbon\Carbon::parse($movieData['dia']['date'])->format('d/m/Y') }}</div>
                        </div>
                        <div class="info-box info-box-orange">
                            <div class="info-label">Hora</div>
                            <div class="info-value">{{ $movieData['hora']['time'] }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="purchase-summary">
                <div class="purchase-header">
                    Resumen de Compra
                </div>
                <div class="purchase-content">
                    <table class="purchase-table">
                        <tr>
                            <th>Descripción</th>
                            <th style="text-align: center">Cant.</th>
                        </tr>
                        <tr>
                            <td>Entrada: {{ $movieData['title'] }}</td>
                            <td style="text-align: center">{{ count($movieData['asientos']) }}</td>
                        </tr>
                        <tr class="total-row">
                            <td colspan="1">TOTAL</td>
                            <td style="text-align: center">
                                {{ collect($movieData['asientos'])->sum('precio') }}€
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="section">
                <div class="section-header">
                    Asientos Reservados
                </div>
                <div class="section-content seat-info">
                    <p>Has reservado <strong>{{ count($movieData['asientos']) }}</strong> asiento(s) para esta función:
                    </p>
                    <div class="seats-container">
                        @foreach ($movieData['asientos'] as $seat)
                            <div class="seat">Fila {{ $seat['fila'] }}, Asiento {{ $seat['columna'] }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="ticket-footer">
            <div class="footer-logo">🎬 TaquillaXpress 🎬</div>
            <p>¡Gracias por tu compra!</p>

            <div class="footer-info">
                <strong>Fecha de compra:</strong><br>
                {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
            </div>

            <p>Disfruta la película 🍿</p>
        </div>
    </div>
</body>

</html>

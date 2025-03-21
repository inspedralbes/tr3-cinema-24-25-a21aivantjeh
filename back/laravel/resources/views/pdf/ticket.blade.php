<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas - {{ $movieData['title'] }}</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: 'Courier New', monospace;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .page-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
            page-break-after: always;
        }

        .ticket-container {
            width: 380px;
            margin: 0 auto;
            padding: 10px;
        }

        .ticket {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            transform: rotate(-1deg);
        }

        .ticket-header {
            background-color: #d32f2f;
            color: white;
            padding: 15px;
            text-align: center;
            position: relative;
        }

        .ticket-header h1 {
            font-size: 24px;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .ticket-header p {
            margin: 5px 0 0;
            font-size: 14px;
        }

        .ticket-content {
            padding: 20px;
            position: relative;
        }

        .ticket-content:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 10px;
            background-image: linear-gradient(45deg, #fff 25%, transparent 25%),
                linear-gradient(-45deg, #fff 25%, transparent 25%);
            background-size: 10px 10px;
            margin-top: -5px;
        }

        .movie-info,
        .seat-info,
        .user-info,
        .date-info {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #ccc;
        }

        .section-title {
            font-size: 14px;
            text-transform: uppercase;
            margin: 0 0 5px;
            color: #888;
            letter-spacing: 1px;
        }

        .movie-title {
            font-size: 22px;
            font-weight: bold;
            margin: 0 0 10px;
            color: #222;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
        }

        .info-label {
            font-weight: bold;
            color: #555;
        }

        .info-value {
            text-align: right;
        }

        .movie-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            margin: 10px 0;
            border-radius: 4px;
        }

        .seat {
            background-color: #f5f5f5;
            border: 2px solid #d32f2f;
            border-radius: 6px;
            padding: 10px;
            margin: 10px 0;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .ticket-footer {
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #888;
            background-color: #f9f9f9;
            border-top: 1px solid #eee;
        }

        .barcode {
            text-align: center;
            padding: 10px 0;
            border-bottom: 1px dashed #ccc;
            margin-bottom: 15px;
        }

        .barcode-text {
            font-family: 'Courier New', monospace;
            font-size: 12px;
            letter-spacing: 5px;
            color: #333;
            margin-top: 5px;
        }

        .tear-line {
            height: 20px;
            background-image: repeating-linear-gradient(to right, #ccc, #ccc 5px, transparent 5px, transparent 10px);
            margin: 15px 0;
            position: relative;
        }

        .tear-line:before {
            content: '✂';
            position: absolute;
            left: 10px;
            top: -5px;
            color: #888;
        }

        .page-number {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    @foreach ($ticketDetails as $index => $seat)
        <div class="page-container">
            <div class="ticket-container">
                <div class="ticket">
                    <!-- Encabezado del ticket -->
                    <div class="ticket-header">
                        <h1>TAQUILLAXPRESS</h1>
                        <p>ENTRADA DE CINE</p>
                    </div>

                    <div class="ticket-content">
                        <!-- Código de barras simulado -->
                        <div class="barcode">
                            <div
                                style="font-family: 'Courier New', monospace; font-size: 40px; letter-spacing: -5px; line-height: 1;">
                                |||||||||||||||||||||||||||</div>
                            <div class="barcode-text">TX{{ rand(10000000, 99999999) }}</div>
                        </div>

                        <!-- Información de la película -->
                        <div class="movie-info">
                            <div class="section-title">PELÍCULA</div>
                            <div class="movie-title">{{ $movieData['title'] }}</div>

                            <div class="info-row">
                                <span class="info-label">Género:</span>
                                <span class="info-value">{{ $movieData['genre'] }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Duración:</span>
                                <span class="info-value">{{ $movieData['duration'] }} min</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Clasificación:</span>
                                <span class="info-value">{{ $movieData['rated'] }}</span>
                            </div>

                            @if (!empty($movieData['local_poster']) && isset($usePosterLocal) && $usePosterLocal)
                                <img class="movie-image" src="{{ $movieData['local_poster'] }}"
                                    alt="Imagen de la película">
                            @elseif (!empty($movieData['poster']))
                                <img class="movie-image" src="{{ $movieData['poster'] }}" alt="Imagen de la película">
                            @endif
                        </div>

                        <!-- Información de la fecha y hora -->
                        <div class="date-info">
                            <div class="section-title">FUNCIÓN</div>
                            <div class="info-row">
                                <span class="info-label">Fecha:</span>
                                <span
                                    class="info-value">{{ \Carbon\Carbon::parse($movieData['dia']['date'])->format('d/m/Y') }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Hora:</span>
                                <span
                                    class="info-value">{{ \Carbon\Carbon::parse($movieData['hora']['time'])->format('H:i') }}</span>
                            </div>
                        </div>

                        <!-- Información del asiento - Individual para cada ticket -->
                        <div class="seat-info">
                            <div class="section-title">ASIENTO</div>
                            <div class="seat">
                                Fila {{ $seat['fila'] }}, Butaca {{ $seat['columna'] }}
                            </div>
                        </div>

                        <!-- Línea de corte -->
                        <div class="tear-line"></div>

                        <!-- Información del usuario -->
                        @if ($user)
                            <div class="user-info">
                                <div class="section-title">CLIENTE</div>
                                <div class="info-row">
                                    <span class="info-label">Nombre:</span>
                                    <span class="info-value">{{ $user['name'] }} {{ $user['surname'] }}</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Pie de página -->
                    <div class="ticket-footer">
                        <p>¡Gracias por elegir TaquillaXpress!</p>
                        <p>Este ticket es válido solo para la función seleccionada. No se permite la reventa.</p>
                    </div>
                </div>
                <div class="page-number">Entrada {{ $index + 1 }} de {{ count($ticketDetails) }}</div>
            </div>
        </div>
    @endforeach
</body>

</html>

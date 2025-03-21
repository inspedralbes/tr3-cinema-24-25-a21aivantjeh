<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f0f0f0;
            padding: 20px;
            margin: 0;
        }
        .ticket {
            background-color: #ffffff;
            padding: 0;
            border-radius: 12px;
            margin: 0 auto;
            max-width: 600px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .ticket-banner {
            background: linear-gradient(135deg, #ff7b00, #ff9500);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .ticket-banner h1 {
            margin: 0;
            font-size: 28px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }
        .ticket-content {
            padding: 20px;
        }
        .movie-info {
            display: flex;
            margin-bottom: 25px;
            background: #f9f9f9;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .movie-poster {
            flex: 0 0 40%;
        }
        .movie-poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .movie-details {
            flex: 0 0 60%;
            padding: 15px;
            background: linear-gradient(to right, #f9f9f9, #fff);
        }
        .movie-details h3 {
            color: #ff7b00;
            margin-top: 0;
            border-bottom: 2px solid #ff7b00;
            padding-bottom: 8px;
        }
        .section {
            margin-bottom: 25px;
            border-radius: 10px;
            padding: 0;
            overflow: hidden;
        }
        .section-header {
            background: linear-gradient(to right, #1e90ff, #4ba3ff);
            color: white;
            padding: 12px 15px;
            font-weight: bold;
            font-size: 18px;
        }
        .section-content {
            padding: 15px;
            background: white;
            border: 1px solid #eaeaea;
            border-top: none;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .info-box {
            background: #f1f7fe;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            border-left: 4px solid #1e90ff;
        }
        .info-box-orange {
            background: #fff5eb;
            border-left: 4px solid #ff7b00;
        }
        .info-label {
            font-size: 14px;
            margin-bottom: 5px;
            color: #666;
        }
        .info-value {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .purchase-summary {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
        }
        .purchase-header {
            background: linear-gradient(to right, #ff7b00, #ff9500);
            color: white;
            padding: 12px 15px;
            font-weight: bold;
            font-size: 18px;
        }
        .purchase-content {
            padding: 20px;
        }
        .ticket-number {
            text-align: center;
            font-size: 16px;
            background: linear-gradient(135deg, #1e90ff, #4ba3ff);
            color: white;
            padding: 12px;
            border-radius: 8px;
            margin: 10px 0 20px;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .purchase-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .purchase-table th {
            background-color: #eee;
            color: #333;
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }
        .purchase-table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .total-row td {
            padding: 12px 10px;
            background-color: #fff5eb;
            font-weight: bold;
            font-size: 18px;
            color: #ff7b00;
            border-top: 2px solid #ff7b00;
            border-bottom: none;
        }
        .qr-code {
            background: #fff;
            text-align: center;
            margin: 20px auto;
            padding: 15px;
            border-radius: 10px;
            max-width: 200px;
            border: 2px dashed #ff7b00;
        }
        .qr-code img {
            max-width: 150px;
            margin: 0 auto;
        }
        .qr-code p {
            margin: 10px 0 0;
            color: #666;
            font-size: 14px;
        }
        .seat-info {
            text-align: center;
        }
        .seats-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin-top: 15px;
        }
        .seat {
            background: linear-gradient(135deg, #ff7b00, #ff9500);
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        .seat::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(255, 255, 255, 0.2), transparent);
            pointer-events: none;
        }
        .ticket-footer {
            background: linear-gradient(to right, #333, #555);
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }
        .footer-logo {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #ff9500;
        }
        .footer-info {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 15px 0;
        }
        .footer-info div {
            margin: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="ticket-banner">
            <h1>¡Tu Entrada para {{ $movieData['title'] }}!</h1>
        </div>
        
        <div class="ticket-content">
            <!-- Movie Information - New Layout -->
            <div class="movie-info">
                <div class="movie-poster">
                    <img src="{{ $movieData['poster'] }}" alt="Póster de {{ $movieData['title'] }}">
                </div>
                <div class="movie-details">
                    <h3>{{ $movieData['title'] }}</h3>
                    <p><strong>Género:</strong> {{ $movieData['genre'] }}</p>
                    <p><strong>Director:</strong> {{ $movieData['director'] }}</p>
                    <p><strong>Año:</strong> {{ $movieData['year'] }}</p>
                    <p><strong>Clasificación:</strong> {{ $movieData['rated'] }}</p>
                </div>
            </div>
            
            <!-- Date and Time Information - Grid Layout -->
            <div class="section">
                <div class="section-header">
                    Fecha y Hora
                </div>
                <div class="section-content">
                    <div class="info-grid">
                        <div class="info-box">
                            <div class="info-label">Fecha</div>
                            <div class="info-value">{{ \Carbon\Carbon::parse($movieData['dia']['date'])->format('d/m/Y') }}</div>
                        </div>
                        <div class="info-box info-box-orange">
                            <div class="info-label">Hora</div>
                            <div class="info-value">{{ $movieData['hora']['time'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Purchase Summary Section - Now First -->
            <div class="purchase-summary">
                <div class="purchase-header">
                    Resumen de Compra
                </div>
                <div class="purchase-content">
                    {{-- <div class="ticket-number">
                        REF: {{ str_pad(rand(1000, 9999), 8, rand(1000, 9999), STR_PAD_LEFT) }}
                    </div> --}}
                    
                    <table class="purchase-table">
                        <tr>
                            <th>Descripción</th>
                            <th>Cant.</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                        <tr>
                            <td>Entrada: {{ $movieData['title'] }}</td>
                            <td>{{ count($movieData['asientos']) }}</td>
                            <td>{{ $movieData['hora']['price'] }}€</td>
                            <td>{{ count($movieData['asientos']) * $movieData['hora']['price'] }}€</td>
                        </tr>
                        @if(isset($movieData['descuento']))
                        <tr>
                            <td colspan="3">Descuento {{ $movieData['descuento']['tipo'] }}</td>
                            <td>-{{ $movieData['descuento']['cantidad'] }}€</td>
                        </tr>
                        @endif
                        <tr class="total-row">
                            <td colspan="3">TOTAL</td>
                            <td>
                                @if(isset($movieData['descuento']))
                                    {{ (count($movieData['asientos']) * $movieData['hora']['price']) - $movieData['descuento']['cantidad'] }}€
                                @else
                                    {{ count($movieData['asientos']) * $movieData['hora']['price'] }}€
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <!-- QR Code -->
            {{-- <div class="qr-code">
                <img :src="{!! $qrCode !!}" alt="Código QR de entrada">
                <p>Presenta este código al entrar</p>
            </div> --}}
            
            <!-- Seat Information - Redesigned -->
            <div class="section">
                <div class="section-header" style="background: linear-gradient(to right, #ff7b00, #ff9500);">
                    Asientos Reservados
                </div>
                <div class="section-content seat-info">
                    <p>Has reservado <strong>{{ count($movieData['asientos']) }}</strong> asiento(s) para esta función:</p>
                    <div class="seats-container">
                        @foreach($movieData['asientos'] as $seat)
                            <div class="seat">Fila {{ $seat['fila'] }}, Asiento {{ $seat['columna'] }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="ticket-footer">
            <div class="footer-logo">🎬 TaquillaXpress</div>
            <p>¡Gracias por tu compra!</p>
            
            <div>
                <strong>Fecha de compra:</strong><br>
                {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
            </div>
            
            <p>Disfruta la película 🍿</p>
        </div>
    </div>
</body>
</html>
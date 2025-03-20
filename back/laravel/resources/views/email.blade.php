<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'Bienvenido a TaquillaXpress' }}</title>
    <style>
        /* Estilos base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            line-height: 1.6;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        /* Header */
        .header {
            background: linear-gradient(to right, #ff6b00, #ff4500);
            padding: 30px 20px;
            text-align: center;
        }
        
        .header-title {
            font-size: 28px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 5px;
        }
        
        .header-subtitle {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.9);
        }
        
        /* Contenido */
        .content {
            padding: 30px;
        }
        
        .greeting {
            color: #333333;
            margin-bottom: 20px;
            font-size: 16px;
        }
        
        .name {
            font-weight: 600;
        }
        
        .alert {
            background-color: #fff5eb;
            border-left: 4px solid #ff6b00;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 0 8px 8px 0;
        }
        
        .alert-text {
            color: #994000;
        }
        
        .text {
            color: #555555;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        
        .brand {
            font-weight: 600;
            color: #ff6b00;
        }
        
        .features {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }
        
        @media (min-width: 640px) {
            .features {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        .feature-item {
            display: flex;
            align-items: flex-start;
            background-color: #f9f9f9;
            padding: 12px;
            border-radius: 8px;
        }
        
        .feature-icon {
            font-size: 24px;
            color: #ff6b00;
            margin-right: 12px;
        }
        
        .feature-content {
            flex: 1;
        }
        
        .feature-title {
            font-weight: 500;
            color: #333333;
            margin-bottom: 2px;
        }
        
        .feature-description {
            font-size: 13px;
            color: #777777;
        }
        
        .button-container {
            text-align: center;
            margin: 25px 0;
        }
        
        .button {
            display: inline-block;
            background-color: #ff6b00;
            color: white;
            font-weight: 600;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(255, 107, 0, 0.3);
            transition: all 0.2s ease;
        }
        
        .button:hover {
            background-color: #ff4500;
            transform: translateY(-2px);
        }
        
        .contact {
            text-align: center;
            font-size: 14px;
            color: #777777;
        }
        
        .link {
            color: #ff6b00;
            text-decoration: none;
        }
        
        .link:hover {
            text-decoration: underline;
        }
        
        /* Footer */
        .footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #eeeeee;
        }
        
        .social {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .social-icon {
            display: inline-flex;
            width: 36px;
            height: 36px;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
            border-radius: 50%;
            color: #888888;
            transition: all 0.2s ease;
        }
        
        .social-icon:hover {
            background-color: #ff6b00;
            color: white;
        }
        
        .copyright {
            font-size: 12px;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <!-- Header con degradado -->
            <div class="header">
                <h1 class="header-title">🎬 TaquillaXpress 🎬</h1>
                <p class="header-subtitle">Tu próxima aventura cinematográfica</p>
            </div>
            
            <!-- Contenido principal -->
            <div class="content">
                <p class="greeting">
                    Hola, <span class="name">{{ $user['name'] }} {{ $user['surname'] }}</span>
                </p>
                
                <div class="alert">
                    <p class="alert-text">
                        🎉 <span style="font-weight: 500;">¡Bienvenido/a a nuestra comunidad!</span>
                    </p>
                </div>
                
                <p class="text">
                    Gracias por unirte a <span class="brand">TaquillaXpress</span>. Estamos 
                    encantados de tenerte con nosotros en esta experiencia cinematográfica única.
                </p>
                
                <p class="text">
                    Con tu cuenta podrás:
                </p>
                
                <div class="features">
                    <div class="feature-item">
                        <div class="feature-icon">🎟️</div>
                        <div class="feature-content">
                            <h3 class="feature-title">Reservar entradas</h3>
                            <p class="feature-description">Compra anticipada sin colas</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">📱</div>
                        <div class="feature-content">
                            <h3 class="feature-title">Acceso digital</h3>
                            <p class="feature-description">Entradas en tu móvil</p>
                        </div>
                    </div>
                </div>
                
                <div class="button-container">
                    <a href="{{ url('comprar-entradas') }}" class="button">
                        🎬 Descubrir películas
                    </a>
                </div>
                
                <div class="contact">
                    <p>Si tienes alguna pregunta, contáctanos en <a href="mailto:info@taquillaxpress.es" class="link">info@taquillaxpress.es</a></p>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="footer">
                <p class="copyright">
                    &copy; {{ date('Y') }} TaquillaXpress. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
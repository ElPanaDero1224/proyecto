<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código de verificación</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #007BFF;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }
        .email-body p {
            margin: 10px 0;
        }
        .verification-code {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #007BFF;
            margin: 20px 0;
        }
        .email-footer {
            text-align: center;
            padding: 15px;
            background-color: #f4f4f9;
            font-size: 14px;
            color: #777777;
        }
        .email-footer a {
            color: #007BFF;
            text-decoration: none;
        }
        .email-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Encabezado -->
        <div class="email-header">
            <h1>Verificación en dos pasos</h1>
        </div>

        <!-- Cuerpo -->
        <div class="email-body">
            <p>Hola,</p>
            <p>Tu código de verificación es:</p>
            <div class="verification-code">{{ $codigo }}</div>
            <p>Este código es válido por 5 minutos. Si no solicitaste este código, por favor ignora este correo.</p>
            <p>Gracias por usar nuestro servicio. ¡Esperamos verte pronto!</p>
        </div>

        <!-- Pie de página -->
        <div class="email-footer">
            <p>© {{ date('Y') }} Turista Sin Maps. Todos los derechos reservados.</p>
            <p>
                <a href="#">Política de Privacidad</a> | <a href="#">Términos y Condiciones</a>
            </p>
        </div>
    </div>
</body>
</html>


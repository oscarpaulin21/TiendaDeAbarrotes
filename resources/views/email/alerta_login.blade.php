<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body{
            margin:0;
            padding:0;
            background:#f4f6f9;
            font-family: Arial, sans-serif;
        }
        .container{
            width:100%;
            padding:30px 0;
        }
        .card{
            max-width:500px;
            background:#ffffff;
            margin:auto;
            border-radius:10px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
            overflow:hidden;
        }
        .header{
            background:#0d6efd;
            color:white;
            padding:20px;
            text-align:center;
        }
        .content{
            padding:25px;
            text-align:center;
        }
        .content h2{
            margin-top:0;
            color:#333;
        }
        .content p{
            color:#555;
            font-size:14px;
        }
        .btn{
            display:inline-block;
            margin-top:20px;
            background:#0d6efd;
            color:white !important;
            padding:12px 20px;
            border-radius:5px;
            text-decoration:none;
            font-weight:bold;
        }
        .footer{
            font-size:12px;
            color:#888;
            text-align:center;
            padding:15px;
            border-top:1px solid #eee;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">

        <div class="header">
            <h2>🔐 Alerta de Seguridad</h2>
        </div>

        <div class="content">
            <h2>Hola, {{ $user->name }}</h2>

            <p>
                Detectamos un nuevo inicio de sesión en tu cuenta.
            </p>

            <p>
                Si fuiste tú, puedes ignorar este mensaje.
            </p>

            <a href="{{ route('acceso') }}" class="btn">
                Verificar actividad
            </a>

            <p style="margin-top:20px; font-size:13px;">
                Si no reconoces esta actividad, te recomendamos cambiar tu contraseña inmediatamente.
            </p>
        </div>

        <div class="footer">
            © {{ date('Y') }} Tienda de Abarrotes - Sistema de Notificaciones
        </div>

    </div>
</div>

</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje Recibido</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 90%;
        }

        h3 {
            font-size: 1.4rem;
            margin: 10px 0;
            color: #444;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-top: 20px;
        }

        .label {
            font-weight: 600;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">
    <h3><span class="label">Nombre:</span> {{ $data['nombre'] }}</h3>
    <h3><span class="label">Apellido:</span> {{ $data['apellido'] ?? '' }}</h3>
    <h3><span class="label">Correo Electrónico:</span> {{ $data['email'] }}</h3>
    <p><span class="label">Mensaje:</span> {{ $data['mensaje'] }}</p>
</div>

</body>
</html>

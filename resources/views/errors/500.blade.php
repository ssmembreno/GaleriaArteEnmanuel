<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error interno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
<div class="text-center">
    <h1 class="display-1 fw-bold text-danger">500</h1>
    <p class="fs-3"> <i class="bi bi-bug-fill text-danger"></i> Error interno del servidor</p>
    <p class="lead">Algo salió mal en nuestro lado. Intenta más tarde.</p>
    <a href="{{ url('/') }}" class="btn btn-primary rounded-pill px-4">Volver al inicio</a>
</div>
</body>
</html>

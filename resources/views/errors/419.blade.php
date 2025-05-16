<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesión expirada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
<div class="text-center">
    <h1 class="display-1 fw-bold text-secondary">419</h1>
    <p class="fs-3"> <i class="bi bi-hourglass-split"></i> Página expirada</p>
    <p class="lead">Tu sesión ha caducado. Por favor, actualiza e inténtalo de nuevo.</p>
    <a href="{{ url()->previous() }}" class="btn btn-secondary rounded-pill px-4">Volver atrás</a>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <h1>DASHBOARD ADMIN</h1>
        <a href="{{ route('usuarios.index') }}" class="btn btn-dark">
            <i class="fa-solid fa-users"></i> Administrar Usuarios
        </a>

        <a href="{{ route('categorias.index') }}" class="btn btn-info">
            Categorías
        </a>
    @endsection
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    @include('partials.alerts')
    
    <h1>REGISTRO</h1>
    <form action="{{ route('registro.store') }}" method="POST">
        <!--  OBLIGATORIO -->
        @csrf
        <input type="text" name="name" placeholder="Nombre" class="form-control">
        <br><br>
        <input type="email" name="email" placeholder="Email" class="form-control">
        <br><br>
        <input type="text" name="phone" placeholder="Teléfono" class="form-control">
        <br><br>
        <input type="password" name="password" placeholder="Contraseña" class="form-control">
        <br><br>
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control">
        <br><br>
        <button type="submit">Guardar</button>
    </form>
    @endsection
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    @include('partials.alerts')
    
    <h1> Inicio de sesion</h1>

    <form action="{{ route('acceso.store') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="email" class="form-control">
        <br>
        <input type="password" name="password" placeholder="contraseña" class="form-control">
        <br>
        <button type="submit" class="btn btn-primary">Iniciar sesion</button>
        
    </form>
    @endsection

</body>
</html>
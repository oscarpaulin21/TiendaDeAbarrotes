@extends('layouts.app')

@section('content')
@include('partials.alerts')

<h1>Crear Usuario</h1>

<form method="POST" action="{{ route('usuarios.store') }}">
@csrf

<input class="form-control mb-2" name="name" placeholder="Nombre">

<input class="form-control mb-2" name="email" placeholder="Email">

<input type="password" class="form-control mb-2" name="password" placeholder="Password">

<label>
    Admin
    <input type="checkbox" name="is_admin" value="1">
</label>

<br><br>

<button class="btn btn-success">Guardar</button>


<a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">
    <i class="fa-solid fa-arrow-left"></i> Regresar
</a>

</form>

@endsection
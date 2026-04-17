@extends('layouts.app')

@section('content')
@include('partials.alerts')

<h1>Editar Usuario</h1>

<form method="POST" action="{{ route('usuarios.update', $usuario) }}">
@csrf
@method('PUT')

<input class="form-control mb-2" name="name" value="{{ $usuario->name }}">

<input class="form-control mb-2" name="email" value="{{ $usuario->email }}">

<div class="form-check form-switch mb-3">
    <input class="form-check-input" type="checkbox" name="is_admin" value="1"
        {{ $usuario->is_admin ? 'checked' : '' }}>
    <label class="form-check-label">Administrador</label>
</div>

<button class="btn btn-primary">Actualizar</button>


<a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">
    <i class="fa-solid fa-arrow-left"></i> Regresar
</a>

</form>

@endsection
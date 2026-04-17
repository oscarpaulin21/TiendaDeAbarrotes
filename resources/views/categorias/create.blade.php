@extends('layouts.app')

@section('content')

<h1>Crear Categoría</h1>

<form method="POST" action="{{ route('categorias.store') }}">
@csrf

<input class="form-control mb-2" name="nombre" placeholder="Nombre">
<textarea class="form-control mb-2" name="descripcion"></textarea>

<button class="btn btn-success">Guardar</button>

</form>

@endsection
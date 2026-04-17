@extends('layouts.app')

@section('content')

<h1>Editar Categoría</h1>

<form method="POST" action="{{ route('categorias.update', $categoria) }}">
@csrf
@method('PUT')

<input class="form-control mb-2" name="nombre" value="{{ $categoria->nombre }}">
<textarea class="form-control mb-2" name="descripcion">{{ $categoria->descripcion }}</textarea>

<button class="btn btn-primary">Actualizar</button>

</form>

@endsection
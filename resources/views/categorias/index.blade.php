@extends('layouts.app')

@section('content')
@include('partials.alerts')

<h1>Categorías</h1>

<a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">
    Nueva Categoría
</a>

<table class="table">
<tr>
    <th>Nombre</th>
    <th>Acciones</th>
</tr>

@foreach($categorias as $categoria)
<tr>
    <td>{{ $categoria->nombre }}</td>
    <td>
        <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning">Editar</a>

        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
        </form>
    </td>
</tr>
@endforeach

</table>

@endsection
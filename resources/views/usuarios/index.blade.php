@extends('layouts.app')

@section('content')
@include('partials.alerts')

<h1>Usuarios</h1>

<a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">
    <i class="fa-solid fa-plus"></i> Nuevo Usuario
</a>

<a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
    <i class="fa-solid fa-arrow-left"></i> Regresar
</a>

<table class="table table-bordered">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Admin</th>
        <th>Acciones</th>
    </tr>

    @foreach($usuarios as $usuario)
    <tr>
        <td>{{ $usuario->name }}</td>
        <td>{{ $usuario->email }}</td>
        <td>{{ $usuario->is_admin ? 'Sí' : 'No' }}</td>
        <td>
            <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning">
                Editar
            </a>

            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection
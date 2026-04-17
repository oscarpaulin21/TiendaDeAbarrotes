<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <h1>Productos Disponibles</h1>
    <div class="d-flex justify-content-end mb-2">

        <a href="{{ route('productos.create') }}" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Agregar Nuevo Producto
        </a>
        <a href="{{ route('productos.google') }}" class="btn btn-info mb-3 me-3">
            <i class="fa-solid fa-globe"></i> Ver Productos Google
        </a>
    <form action="{{ route('cerrar') }}" method = "POST">
        @csrf

        <button type="submit" class="btn btn-danger me-3"><i class="fa-solid fa-arrow-right-from-bracket"></i>Cerrar Sesión</button>
    </form>
    <!--agregar boton de registro usuario que el admin solo pueda hacer!-->
    <form action="{{ route('registroAdmin') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary me-3"><i class="fa-solid fa-user-plus"></i>Registrar Usuario</button>
    </form>
    @if (Auth::user()->is_admin)
        <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary mb-3">
            Panel Admin
        </a>
    @endif

    </div>
    @include('partials.alerts')

    <Table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>

                <!-- 🔥 SOLO ESTO SE AGREGÓ -->
                <th>Categoría</th>

                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->stock }}</td>

                <!-- 🔥 SOLO ESTO SE AGREGÓ -->
                <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>

                <td>
                    <a href="{{ route('productos.edit', $producto->id) }}">
                        <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                    </a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                            <i class="fa-solid fa-trash"></i>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</body>
</html>
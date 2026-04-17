<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    @include('partials.alerts')
    
    <h1>Editar Producto : {{ $producto->nombre }}</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input value="{{ $producto->nombre }}" type="text" class="form-control mb-3" name="nombre" placeholder="Nombre del Producto">
        <br>

        <input value="{{ $producto->descripcion }}" type="text" class="form-control mb-3" name="descripcion" placeholder="Descripción">
        <br>

        <input value="{{ $producto->precio }}" type="number" step="0.01" class="form-control mb-3" name="precio" placeholder="Precio">
        <br>

        <input value="{{ $producto->stock }}" type="number" class="form-control mb-3" name="stock" placeholder="Stock">

        <!-- 🔥 SOLO ESTO SE AGREGÓ -->
        <div class="mb-3">
            <label>Categoría</label>
            <select name="categoria_id" class="form-control">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-outline-primary">
            <i class="fa-solid fa-floppy-disk"></i> Guardar Cambios
        </button>
    </form>

    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('productos.index') }}" class="btn btn-danger">
            <i class="fa-solid fa-ban"></i> Cancelar
        </a>
    </div>

    @endsection
</body>
</html>